<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {}

    public static function runStatic(): void
    {
        $l10n = [
            'date_format' => 'Y-m-d',
            'date_alt_format' => 'F j, Y',
            'time_format' => 'H:i:s',
            'date_time_format' => 'Y-m-d H:i:s',
        ];
        DB::table('options')->insert([
            'name' => 'l10n',
            'value' => json_encode($l10n),
            'autoload' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('options')->insert([
            'name' => 'app',
            'value' => json_encode(['version' => '1.0.0']),
            'autoload' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $languages = [
            // English variants
            'en' => 'English',
            'en-ZA' => 'English (South Africa)',
            'en-GB' => 'English (United Kingdom)',
            'en-US' => 'English (United States)',
            'en-AU' => 'English (Australia)',
            'en-CA' => 'English (Canada)',

            // South African languages (official)
            'af' => 'Afrikaans',
            'zu' => 'Zulu',
            'xh' => 'Xhosa',
            'st' => 'Southern Sotho',
            'tn' => 'Tswana',
            'ts' => 'Tsonga',
            'ss' => 'Swati',
            've' => 'Venda',
            'nr' => 'Southern Ndebele',
            'nso' => 'Northern Sotho',

            // Complete set of ISO 639-1 language codes and English names
            'ab' => 'Abkhaz',
            'aa' => 'Afar',
            'ak' => 'Akan',
            'sq' => 'Albanian',
            'am' => 'Amharic',
            'ar' => 'Arabic',
            'an' => 'Aragonese',
            'hy' => 'Armenian',
            'as' => 'Assamese',
            'av' => 'Avaric',
            'ae' => 'Avestan',
            'ay' => 'Aymara',
            'az' => 'Azerbaijani',
            'bm' => 'Bambara',
            'ba' => 'Bashkir',
            'eu' => 'Basque',
            'be' => 'Belarusian',
            'bn' => 'Bengali',
            'bh' => 'Bihari languages',
            'bi' => 'Bislama',
            'bs' => 'Bosnian',
            'br' => 'Breton',
            'bg' => 'Bulgarian',
            'my' => 'Burmese',
            'ca' => 'Catalan; Valencian',
            'ch' => 'Chamorro',
            'ce' => 'Chechen',
            'ny' => 'Chichewa; Chewa; Nyanja',
            'zh' => 'Chinese',
            'cu' => 'Church Slavic; Old Slavonic; Church Slavonic; Old Bulgarian; Old Church Slavonic',
            'cv' => 'Chuvash',
            'kw' => 'Cornish',
            'co' => 'Corsican',
            'cr' => 'Cree',
            'hr' => 'Croatian',
            'cs' => 'Czech',
            'da' => 'Danish',
            'dv' => 'Divehi; Dhivehi; Maldivian',
            'nl' => 'Dutch; Flemish',
            'dz' => 'Dzongkha',
            'eo' => 'Esperanto',
            'et' => 'Estonian',
            'ee' => 'Ewe',
            'fo' => 'Faroese',
            'fj' => 'Fijian',
            'fi' => 'Finnish',
            'fr' => 'French',
            'fy' => 'Western Frisian',
            'ff' => 'Fulah',
            'ka' => 'Georgian',
            'de' => 'German',
            'gd' => 'Gaelic; Scottish Gaelic',
            'ga' => 'Irish',
            'gl' => 'Galician',
            'gv' => 'Manx',
            'el' => 'Greek, Modern (1453–)',
            'gn' => 'Guarani',
            'gu' => 'Gujarati',
            'ht' => 'Haitian; Haitian Creole',
            'ha' => 'Hausa',
            'he' => 'Hebrew',
            'hz' => 'Herero',
            'hi' => 'Hindi',
            'ho' => 'Hiri Motu',
            'hu' => 'Hungarian',
            'ia' => 'Interlingua (International Auxiliary Language Association)',
            'id' => 'Indonesian',
            'ie' => 'Interlingue; Occidental',
            'ig' => 'Igbo',
            'ik' => 'Inupiaq',
            'io' => 'Ido',
            'is' => 'Icelandic',
            'it' => 'Italian',
            'iu' => 'Inuktitut',
            'ja' => 'Japanese',
            'jv' => 'Javanese',
            'kl' => 'Kalaallisut; Greenlandic',
            'kn' => 'Kannada',
            'kr' => 'Kanuri',
            'ks' => 'Kashmiri',
            'kk' => 'Kazakh',
            'km' => 'Central Khmer',
            'ki' => 'Kikuyu; Gikuyu',
            'rw' => 'Kinyarwanda',
            'ky' => 'Kirghiz; Kyrgyz',
            'kv' => 'Komi',
            'kg' => 'Kongo',
            'ko' => 'Korean',
            'ku' => 'Kurdish',
            'kj' => 'Kwanyama; Kuanyama',
            'la' => 'Latin',
            'lb' => 'Luxembourgish; Letzeburgesch',
            'lg' => 'Ganda',
            'li' => 'Limburgan; Limburger; Limburgish',
            'ln' => 'Lingala',
            'lo' => 'Lao',
            'lt' => 'Lithuanian',
            'lu' => 'Luba-Katanga',
            'lv' => 'Latvian',
            'mg' => 'Malagasy',
            'mh' => 'Marshallese',
            'mi' => 'Maori',
            'mk' => 'Macedonian',
            'ml' => 'Malayalam',
            'mn' => 'Mongolian',
            'mr' => 'Marathi',
            'ms' => 'Malay',
            'mt' => 'Maltese',
            'na' => 'Nauru',
            'nv' => 'Navajo; Navaho',
            'nd' => 'Ndebele, North; North Ndebele',
            'ng' => 'Ndonga',
            'ne' => 'Nepali',
            'nn' => 'Norwegian Nynorsk; Nynorsk, Norwegian',
            'nb' => 'Bokmål, Norwegian; Norwegian Bokmål',
            'no' => 'Norwegian',
            'ii' => 'Sichuan Yi; Nuosu',
            'oc' => 'Occitan (post 1500); Provençal',
            'oj' => 'Ojibwa',
            'om' => 'Oromo',
            'or' => 'Oriya',
            'os' => 'Ossetian; Ossetic',
            'pa' => 'Panjabi; Punjabi',
            'pi' => 'Pali',
            'fa' => 'Persian',
            'pl' => 'Polish',
            'ps' => 'Pashto; Pushto',
            'pt' => 'Portuguese',
            'qu' => 'Quechua',
            'rm' => 'Romansh',
            'rn' => 'Rundi',
            'ro' => 'Romanian; Moldavian; Moldovan',
            'ru' => 'Russian',
            'sa' => 'Sanskrit',
            'sc' => 'Sardinian',
            'sd' => 'Sindhi',
            'se' => 'Northern Sami',
            'sm' => 'Samoan',
            'sg' => 'Sango',
            'sr' => 'Serbian',
            'sn' => 'Shona',
            'si' => 'Sinhala; Sinhalese',
            'sk' => 'Slovak',
            'sl' => 'Slovenian',
            'so' => 'Somali',
            'es' => 'Spanish; Castilian',
            'su' => 'Sundanese',
            'sw' => 'Swahili',
            'sv' => 'Swedish',
            'ta' => 'Tamil',
            'te' => 'Telugu',
            'tg' => 'Tajik',
            'th' => 'Thai',
            'ti' => 'Tigrinya',
            'bo' => 'Tibetan',
            'tk' => 'Turkmen',
            'tl' => 'Tagalog',
            'to' => 'Tonga (Tonga Islands)',
            'tr' => 'Turkish',
            'tt' => 'Tatar',
            'tw' => 'Twi',
            'ty' => 'Tahitian',
            'ug' => 'Uighur; Uyghur',
            'uk' => 'Ukrainian',
            'ur' => 'Urdu',
            'uz' => 'Uzbek',
            'vi' => 'Vietnamese',
            'vo' => 'Volapük',
            'wa' => 'Walloon',
            'cy' => 'Welsh',
            'wo' => 'Wolof',
            'yi' => 'Yiddish',
            'yo' => 'Yoruba',
            'za' => 'Zhuang; Chuang',
        ];
        DB::table('options')->insert([
            'name' => 'languages',
            'value' => json_encode($languages),
            'autoload' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $interests = [
            'Music',
            'Travel',
            'Photography',
            'Cooking',
            'Technology',
            'Fitness',
            'Art',
            'Reading',
        ];
        DB::table('options')->insert([
            'name' => 'interests',
            'value' => json_encode($interests),
            'autoload' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
