[![Stand With Palestine](https://raw.githubusercontent.com/TheBSD/StandWithPalestine/main/banner-no-action.svg)](https://TheBSD.github.io/StandWithPalestine/)

![Filament Excel.png](https://banners.beyondco.de/Filament%20Excel.png?theme=light&packageManager=composer+require&packageName=yemenopensource%2Ffilament-excel&pattern=architect&style=style_1&description=The+easiest+way+to+work+with+%22Excel%22&md=1&showWatermark=1&fontSize=100px&images=table)

# Filament Excel

The easiest way to work with "Excel", you only need to get fimiliar with [Laravel Excel](https://github.com/SpartnerNL/Laravel-Excel) to supercharged Excel exports and imports on your filament projects.


## Installation

You can install the package via Composer:

```bash
composer require yemenopensource/filament-excel
```

## Usage
Create [Create a new Import](https://docs.laravel-excel.com/3.1/imports/) for your model for example 'Content' model.

```php
php artisan make:import ContentsImport --model=Content
```

Use the `Import` action on your filament resouce list page for example 'ListContents' page is a page to list the records of 'ContentResource':

```php
// app\Filament\Resources\ContentResource\Pages\ListContents.php

use YOS\FilamentExcel\Actions\Import;

protected function getHeaderActions(): array
{
    return [
        // ...  other actions like 'CreateAction'
        Import::make()
            ->import(ContentsImport::class)
            ->type(\Maatwebsite\Excel\Excel::XLSX)
            ->label('Import from excel')
            ->hint('Upload xlsx type')
            ->icon(HeroIcons::C_ARROW_UP)
            ->color('success'),
    ];
}
```

## Configuration

The package provides a configuration file that allows you to customize its behavior.

You can publish the configuration file by using the following command:

```bash
php artisan vendor:publish --provider="YOS\FilamentExcel\ServiceProvider" --tag="config"
```

After publishing the configuration file, you can find it at config/filamentExcel.php. Open this file and modify it according to your requirements.

## Translations

You can publish translations using:

```bash
php artisan vendor:publish --provider="YOS\FilamentExcel\ServiceProvider" --tag="config"
```

When users of the package execute Laravel's `vendor:publish` Artisan command, the package's language files will be published to `language path/vendor/filament-excel`.
## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, please feel free to create an issue or a pull request.

## License

The package is part of yemen open source and it is licensed under the MIT license.

## Credits

- [Muath Alsowadi](https://github.com/muath-ye)
