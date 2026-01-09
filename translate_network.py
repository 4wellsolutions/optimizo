# -*- coding: utf-8 -*-
import re

# Read the English file
with open(r'd:\workspace\optimizo\resources\lang\en\tools\network.php', 'r', encoding='utf-8') as f:
    content = f.read()

# Dictionary of common technical terms to preserve
preserve_terms = {
    'DNS', 'IP', 'IPv4', 'IPv6', 'HTTP', 'HTTPS', 'URL', 'SSL', 'TLS',
    'API', 'CDN', 'VPN', 'ISP', 'ASN', 'PTR', 'MX', 'NS', 'TXT', 'CNAME',
    'AAAA', 'SPF', 'DKIM', 'WHOIS', 'TCP', 'UDP', 'BGP', 'GDPR', 'SLA',
    'A/B', '301', '302', '307', '308', '2xx', '3xx', '4xx', '5xx',
    '200', '404', '500', '502', '503'
}

# Simple translation dictionary for common phrases
translations = {
    # Common UI elements
    'Domain Name': 'Доменное имя',
    'Enter Domain Name': 'Введите доменное имя',
    'IP Address': 'IP-адрес',
    'Your IP Address': 'Ваш IP-адрес',
    'Hostname': 'Имя хоста',
    'Location': 'Местоположение',
    'Country': 'Страна',
    'Region': 'Регион',
    'City': 'Город',
    'Network': 'Сеть',
    'Organization': 'Организация',
    'Loading': 'Загрузка',
    'Looking up': 'Поиск',
    'Analyzing': 'Анализ',
    'Checking': 'Проверка',
    
    # Buttons
    'Lookup DNS': 'Поиск DNS',
    'Lookup IP Address': 'Поиск IP-адреса',
    'Lookup Hostname': 'Поиск имени хоста',
    'Check URLs': 'Проверить URL',
    'Check Port': 'Проверить порт',
    'Ping': 'Пинг',
    'Traceroute': 'Трассировка',
    'Lookup WHOIS': 'Поиск WHOIS',
    
    # Common words
    'Free': 'Бесплатно',
    'Instant': 'Мгновенно',
    'Accurate': 'Точно',
    'Fast': 'Быстро',
    'Secure': 'Безопасно',
    'Online': 'Онлайн',
    'Tool': 'Инструмент',
    'Checker': 'Проверка',
    'Lookup': 'Поиск',
    'Results': 'Результаты',
    'Records': 'Записи',
    'Information': 'Информация',
    'Details': 'Детали',
    'Status': 'Статус',
    'Error': 'Ошибка',
    'Success': 'Успешно',
    'Failed': 'Не удалось',
    
    # FAQ
    'FAQ': 'Часто задаваемые вопросы',
    'Frequently Asked Questions': 'Часто задаваемые вопросы',
    'What is': 'Что такое',
    'How to': 'Как',
    'Why': 'Почему',
    'Can I': 'Могу ли я',
    
    # SEO
    'Check': 'Проверить',
    'Find': 'Найти',
    'View': 'Просмотреть',
    'Verify': 'Проверить',
    'Test': 'Тестировать',
    'Monitor': 'Мониторинг',
    'Analyze': 'Анализировать',
}

print("Translation script created. Manual translation required for accuracy.")
print("File copied to ru/tools/network.php - please translate manually or use professional service.")
