<?php

namespace App\Http\Controllers\Tools\Youtube;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\Log;

class TextToSpeechController extends Controller
{
    public function index()
    {
        // Common voices list
        $voices = [
            'en-US' => [
                'en-US-AriaNeural' => 'Aria (Female)',
                'en-US-GuyNeural' => 'Guy (Male)',
                'en-US-JennyNeural' => 'Jenny (Female)',
                'en-US-AnaNeural' => 'Ana (Female)',
                'en-US-ChristopherNeural' => 'Christopher (Male)',
                'en-US-EricNeural' => 'Eric (Male)',
                'en-US-MichelleNeural' => 'Michelle (Female)',
                'en-US-RogerNeural' => 'Roger (Male)'
            ],
            'en-GB' => [
                'en-GB-SoniaNeural' => 'Sonia (Female)',
                'en-GB-RyanNeural' => 'Ryan (Male)',
                'en-GB-LibbyNeural' => 'Libby (Female)',
                'en-GB-MaisieNeural' => 'Maisie (Female)',
                'en-GB-ThomasNeural' => 'Thomas (Male)'
            ],
            'en-AU' => [
                'en-AU-NatashaNeural' => 'Natasha (Female)',
                'en-AU-WilliamNeural' => 'William (Male)'
            ],
            'es-ES' => [
                'es-ES-ElviraNeural' => 'Elvira (Female)',
                'es-ES-AlvaroNeural' => 'Alvaro (Male)',
                'es-ES-AbrilNeural' => 'Abril (Female)',
                'es-ES-ArnauNeural' => 'Arnau (Male)'
            ],
            'es-MX' => [
                'es-MX-DaliaNeural' => 'Dalia (Female)',
                'es-MX-JorgeNeural' => 'Jorge (Male)'
            ],
            'fr-FR' => [
                'fr-FR-DeniseNeural' => 'Denise (Female)',
                'fr-FR-HenriNeural' => 'Henri (Male)',
                'fr-FR-CelesteNeural' => 'Celeste (Female)',
                'fr-FR-JeromeNeural' => 'Jerome (Male)'
            ],
            'fr-CA' => [
                'fr-CA-SylvieNeural' => 'Sylvie (Female)',
                'fr-CA-AntoineNeural' => 'Antoine (Male)'
            ],
            'de-DE' => [
                'de-DE-KatjaNeural' => 'Katja (Female)',
                'de-DE-ConradNeural' => 'Conrad (Male)',
                'de-DE-AmalaNeural' => 'Amala (Female)',
                'de-DE-BerndNeural' => 'Bernd (Male)'
            ],
            'ja-JP' => [
                'ja-JP-NanamiNeural' => 'Nanami (Female)',
                'ja-JP-KeitaNeural' => 'Keita (Male)',
                'ja-JP-AoiNeural' => 'Aoi (Female)',
                'ja-JP-DaichiNeural' => 'Daichi (Male)'
            ],
            'zh-CN' => [
                'zh-CN-XiaoxiaoNeural' => 'Xiaoxiao (Female)',
                'zh-CN-YunxiNeural' => 'Yunxi (Male)',
                'zh-CN-YunjianNeural' => 'Yunjian (Male)'
            ],
            'ko-KR' => [
                'ko-KR-SunHiNeural' => 'SunHi (Female)',
                'ko-KR-InJoonNeural' => 'InJoon (Male)'
            ],
            'pt-BR' => [
                'pt-BR-FranciscaNeural' => 'Francisca (Female)',
                'pt-BR-AntonioNeural' => 'Antonio (Male)'
            ],
            'it-IT' => [
                'it-IT-ElsaNeural' => 'Elsa (Female)',
                'it-IT-IsabellaNeural' => 'Isabella (Female)',
                'it-IT-DiegoNeural' => 'Diego (Male)'
            ],
            'ru-RU' => [
                'ru-RU-SvetlanaNeural' => 'Svetlana (Female)',
                'ru-RU-DmitryNeural' => 'Dmitry (Male)'
            ],
            'hi-IN' => [
                'hi-IN-SwaraNeural' => 'Swara (Female)',
                'hi-IN-MadhurNeural' => 'Madhur (Male)'
            ]
        ];

        $tool = (object) [
            'name' => 'Text to Speech',
            'slug' => 'text-to-speech',
            'description' => 'Convert text into natural-sounding speech.',
            'category' => 'youtube'
        ];

        return view('tools.youtube.text-to-speech', compact('voices', 'tool'));
    }

    public function process(Request $request)
    {
        // Increase PHP execution time to prevent timeout before process finishes
        set_time_limit(200);

        $request->validate([
            'text' => 'required|string|max:5000',
            'voice' => 'required|string',
        ]);

        $text = $request->input('text');
        $voice = $request->input('voice');

        // Use temporary files for both input text and output audio
        $tempInputFile = tempnam(sys_get_temp_dir(), 'tts_input_');
        $tempOutputFile = $tempInputFile . '.mp3';

        try {
            file_put_contents($tempInputFile, $text);

            // Command: python3.12 -m edge_tts --file <temp_file> --voice <voice> --write-media <output_file>
            $pythonPath = env('TTS_PYTHON_PATH', 'python3.12');
            $command = [
                $pythonPath,
                '-m',
                'edge_tts',
                '--file',
                $tempInputFile,
                '--voice',
                $voice,
                '--write-media',
                $tempOutputFile
            ];

            // Prepare robust environment variables for Python on Windows
            $env = [
                'SystemRoot' => getenv('SystemRoot') ?: 'C:\\Windows',
                'PATH' => getenv('PATH'),
                'TEMP' => sys_get_temp_dir(),
                'APPDATA' => getenv('APPDATA'),
                'LOCALAPPDATA' => getenv('LOCALAPPDATA'),
                'USERPROFILE' => getenv('USERPROFILE'),
                'HOMEDRIVE' => getenv('HOMEDRIVE'),
                'HOMEPATH' => getenv('HOMEPATH'),
            ];

            // Filter out empty values
            $env = array_filter($env);

            $process = new Process($command, null, $env);
            $process->setTimeout(300);
            $process->setInput(null); // Explicitly close stdin to prevent waiting

            $process->run();

            if (!$process->isSuccessful()) {
                $errorOutput = $process->getErrorOutput();
                Log::error('TTS Process failed: ' . $errorOutput);
                throw new \Exception('Failed to generate audio: ' . $errorOutput);
            }

            if (!file_exists($tempOutputFile) || filesize($tempOutputFile) === 0) {
                Log::error('TTS Output file empty or missing');
                throw new \Exception('Audio generation produced no output.');
            }

            // Return download response
            return response()->download($tempOutputFile, 'speech.mp3', [
                'Content-Type' => 'audio/mpeg',
            ])->deleteFileAfterSend(true);

        } catch (\Exception $e) {
            // Clean up files manually if error occurs before response
            if (file_exists($tempOutputFile))
                @unlink($tempOutputFile);

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        } finally {
            // Always clean up input file
            if (file_exists($tempInputFile))
                @unlink($tempInputFile);
        }
    }
}
