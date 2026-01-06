<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tool;
use App\Models\Translation;
use App\Models\Language;

class ToolTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get Russian language
        $russianLanguage = Language::where('code', 'ru')->first();

        if (!$russianLanguage) {
            $this->command->error('Russian language not found in database!');
            $this->command->info('Please run LanguageSeeder first.');
            return;
        }

        // Clear existing tool translations for Russian
        Translation::where('translatable_type', 'App\Models\Tool')
            ->where('language_id', $russianLanguage->id)
            ->delete();

        // Get all tools
        $tools = Tool::all();

        $this->command->info("Translating {$tools->count()} tools to Russian...");

        $progressBar = $this->command->getOutput()->createProgressBar($tools->count());
        $progressBar->start();

        foreach ($tools as $tool) {
            $this->translateTool($tool, $russianLanguage->id);
            $progressBar->advance();
        }

        $progressBar->finish();
        $this->command->newLine();
        $this->command->info('Tool translations completed successfully!');
    }

    /**
     * Translate a single tool
     */
    private function translateTool(Tool $tool, int $languageId): void
    {
        $translations = $this->getTranslations($tool);

        foreach ($translations as $field => $value) {
            Translation::create([
                'translatable_type' => 'App\Models\Tool',
                'translatable_id' => $tool->id,
                'language_id' => $languageId,
                'field' => $field,
                'value' => $value,
            ]);
        }
    }

    /**
     * Get Russian translations for a tool
     */
    private function getTranslations(Tool $tool): array
    {
        // Translation mappings for common terms
        $termMap = [
            'YouTube' => 'YouTube',
            'Channel' => 'Канал',
            'Video' => 'Видео',
            'Thumbnail' => 'Миниатюра',
            'Tag' => 'Тег',
            'Monetization' => 'Монетизация',
            'Earnings' => 'Доходы',
            'Data' => 'Данные',
            'Extractor' => 'Извлечение',
            'Finder' => 'Поиск',
            'Checker' => 'Проверка',
            'Generator' => 'Генератор',
            'Downloader' => 'Загрузчик',
            'Calculator' => 'Калькулятор',
            'Converter' => 'Конвертер',
            'Analyzer' => 'Анализатор',
            'Formatter' => 'Форматировщик',
            'Minifier' => 'Минификатор',
            'Encoder' => 'Кодировщик',
            'Decoder' => 'Декодер',
            'Compressor' => 'Компрессор',
            'Lookup' => 'Поиск',
            'Test' => 'Тест',
            'Scanner' => 'Сканер',
            'Viewer' => 'Просмотр',
            'Parser' => 'Парсер',
            'SEO' => 'SEO',
            'Meta Tag' => 'Мета-тег',
            'Keyword' => 'Ключевое слово',
            'Density' => 'Плотность',
            'Backlink' => 'Обратная ссылка',
            'SERP' => 'Поисковая выдача',
            'Image' => 'Изображение',
            'JSON' => 'JSON',
            'XML' => 'XML',
            'CSV' => 'CSV',
            'HTML' => 'HTML',
            'CSS' => 'CSS',
            'JavaScript' => 'JavaScript',
            'Base64' => 'Base64',
            'QR Code' => 'QR-код',
            'Password' => 'Пароль',
            'MD5' => 'MD5',
            'URL' => 'URL',
            'IP' => 'IP',
            'DNS' => 'DNS',
            'WHOIS' => 'WHOIS',
            'Port' => 'Порт',
            'SSL' => 'SSL',
            'Ping' => 'Пинг',
            'Domain' => 'Домен',
            'ISP' => 'Провайдер',
            'Network' => 'Сеть',
            'Case' => 'Регистр',
            'Text' => 'Текст',
            'Binary' => 'Двоичный',
            'Hex' => 'Шестнадцатеричный',
            'Decimal' => 'Десятичный',
            'Octal' => 'Восьмеричный',
            'Morse' => 'Морзе',
            'ASCII' => 'ASCII',
            'RGB' => 'RGB',
            'Color' => 'Цвет',
            'Slug' => 'Слаг',
            'Username' => 'Имя пользователя',
            'Handle' => 'Хэндл',
            'ID' => 'ID',
        ];

        // Translate name
        $name = $this->translateString($tool->name, $termMap);

        // Translate description
        $description = $this->translateDescription($tool->description ?? $tool->meta_description, $termMap);

        // Translate meta title
        $metaTitle = $this->translateString($tool->meta_title ?? $tool->name, $termMap);

        // Translate meta description
        $metaDescription = $this->translateDescription($tool->meta_description, $termMap);

        // Translate meta keywords
        $metaKeywords = $this->translateKeywords($tool->meta_keywords, $termMap);

        return [
            'name' => $name,
            'description' => $description,
            'meta_title' => $metaTitle,
            'meta_description' => $metaDescription,
            'meta_keywords' => $metaKeywords,
        ];
    }

    /**
     * Translate a string using term mappings
     */
    private function translateString(string $text, array $termMap): string
    {
        foreach ($termMap as $english => $russian) {
            $text = str_replace($english, $russian, $text);
        }
        return $text;
    }

    /**
     * Translate description with common phrases
     */
    private function translateDescription(?string $text, array $termMap): string
    {
        if (empty($text)) {
            return '';
        }

        // Common phrase mappings
        $phrases = [
            'Free' => 'Бесплатный',
            'Online' => 'Онлайн',
            'Tool' => 'Инструмент',
            'Tools' => 'Инструменты',
            'Professional' => 'Профессиональный',
            'Easy to use' => 'Простой в использовании',
            'Fast' => 'Быстрый',
            'Instant' => 'Мгновенный',
            'No registration required' => 'Регистрация не требуется',
            'Upload' => 'Загрузить',
            'Download' => 'Скачать',
            'Convert' => 'Конвертировать',
            'Generate' => 'Генерировать',
            'Check' => 'Проверить',
            'Analyze' => 'Анализировать',
            'Extract' => 'Извлечь',
            'Find' => 'Найти',
            'Calculate' => 'Рассчитать',
            'Optimize' => 'Оптимизировать',
            'Format' => 'Форматировать',
            'Encode' => 'Кодировать',
            'Decode' => 'Декодировать',
            'Compress' => 'Сжать',
            'and' => 'и',
            'to' => 'в',
            'from' => 'из',
            'with' => 'с',
            'for' => 'для',
            'your' => 'ваш',
            'the' => '',
        ];

        $allMappings = array_merge($termMap, $phrases);
        return $this->translateString($text, $allMappings);
    }

    /**
     * Translate keywords
     */
    private function translateKeywords(?string $keywords, array $termMap): string
    {
        if (empty($keywords)) {
            return '';
        }

        $keywordArray = explode(',', $keywords);
        $translatedKeywords = [];

        foreach ($keywordArray as $keyword) {
            $keyword = trim($keyword);
            $translatedKeywords[] = $this->translateString($keyword, $termMap);
        }

        return implode(', ', $translatedKeywords);
    }
}
