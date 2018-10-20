# WordKit

WordKit is an open-source API for spellchecking and word translation, using MySQL database as dictionary.

## Configuration

1. Create Lumen project using Composer

`composer create-project --prefer-dist laravel/lumen blog`

2. Unarchive WordKit to your newly created project.

3. Create create a copy of .env.example, and name it as .env

4. Change .env settings to yours

**Don't forget to change APP_KEY and WORDKIT_KEY**

## API Methods

| Type    | URL                               | Method |  POST Parameters |
|---------|-----------------------------------|--------|------------------|
|  Public | /translate/lang_from/lang_to/word | GET    | None             |
| Public  | /spellcheck/lang/word             | GET    | None             |
| Private | /admin/add                        | POST   | word,lang,key    |
| Private | /admin/remove                     | POST   | word,lang,key    |

