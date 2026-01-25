import asyncio
import edge_tts
import argparse
import sys
import os

async def main():
    parser = argparse.ArgumentParser(description='Edge TTS Wrapper')
    parser.add_argument('--input_file', required=True, help='Path to input text file')
    parser.add_argument('--output_file', required=True, help='Path to output audio file')
    parser.add_argument('--voice', required=True, help='Voice to use')
    
    args = parser.parse_args()

    try:
        # Logging for debug
        log_file = os.path.join(os.path.dirname(args.output_file), 'tts_debug.log')
        
        # Explicitly read as UTF-8 with BOM signature handling
        with open(args.input_file, 'r', encoding='utf-8-sig') as f:
            text = f.read()

        with open(log_file, 'a', encoding='utf-8') as f:
             f.write(f"Processing text: {text[:50]}... (Len: {len(text)})\n")

        if not text:
            print("Error: Input text is empty")
            sys.exit(1)

        communicate = edge_tts.Communicate(text, args.voice)
        await communicate.save(args.output_file)
        print("Success")

    except Exception as e:
        print(f"Error: {str(e)}")
        sys.exit(1)

if __name__ == "__main__":
    if sys.platform == 'win32':
        asyncio.set_event_loop_policy(asyncio.WindowsSelectorEventLoopPolicy())
    asyncio.run(main())
