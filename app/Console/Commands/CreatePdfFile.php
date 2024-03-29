<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Knp\Snappy\Pdf;

/**
 * examples for use (you can copy this cases for use):
 * WARNING: change /$PATH_TO_LARAVEL_FOLDER/artisan to your full path to Laravel project folder.
 *   My path for example: /var/www/htmltopdf/artisan
 * 1)
 php /$PATH_TO_LARAVEL_FOLDER/artisan cv:generate --file /tmp/1234.json
 * in this case you can see cv pdf file in /tmp/ folder (path where json file),
 * and you can see full path file in returned json
 *
 * 2)
 php /$PATH_TO_LARAVEL_FOLDER/artisan cv:generate '{ "header_text": "Header text", "logo": "data:image\/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAAAmCAYAAADOZxX5AAAD8ElEQVR4nO1b3XGjMBC+EiiBEujg0kHoIO7g3MG5g0sHdgeL84KkF\/ykzfCCO3A6sDvIPfBjAQtIQrqZs\/XNaJJAWK30af+E+PHDI0CUCQjcAJcp5PjS+53jrv4p0+Za7FOXgBlAUUXAZQoCNyDKRPs5leCiinzqGKCgnfTVcoLl+QeIMgkW8h+hjUu+5B85vgWrc4g6dunHLSPZRRVlXELG8Tvj+J0x3EOOLz76ehrU2aAnwkSZZFxWHWG9Jqsjxzcf\/T402hjmRTaXacbllSasR971yPF3iKOaACa3TuXlGB\/Z56+eOzRpteuMXer0UACBGxerWyFqwg2aNeC4czC8xwMUVbTGylwQBRzPwOQ7cDwH0jRgU4t5sKhTJ7vdfWHyHQRuXI\/3IaA7Ma6JGsSvS4hfjuCVKCJz1M1eQZTJh5A\/2wZFFal\/27ZRPwZyqf+lFiLkGFPPriNKlMmRyz8Zw4sPcoDjDTjuQOAGmMzIrHFhEMDx1JOZ44sri1dLDhO5jV6HkQdRxtJsLvRKH+B46G7eJ0VeM4aFZvNClKogufq4TIHjATjegMmvpQLfG2l3q6+gqCJT0hrdzqSsmrCex1JjeX+APQL9EbJIGJPvc0So+i7+z5A0USbA8aS086Dvr8F9qt2G+g5Jm5PTm2+COIKws5Zb7AgcCfVMWOsCHGFI2uj+cLI1SofaEvpWMLI0hnudeEgTZ0EYMbAYmNz6JnDSBayAF9JyjBdJm2mUvKH1NnJvTrbpFAIPlKtYQZjxitKaYEvSQJTJZDwf675bQ1rdH25Gcn3XnvfzHrgzJdTWBeik\/dakaZIAHM+kHI2Y1ulQVBGd2NWJiem89AZn\/Eztr5eJY3hRV7J2DaaxpeaTNDVhsnGz7RzN17YriLPdcwSOO3N3Ka867+p03Icr0uh4fp9QIhG5TLlXtX8yUxz2NXhGG7b+dZhpTbiYU+1WZXqf5Hni2ux2sX93pO2acmHgOWo9bWJaxnBPhQkyo2S4N5\/8RjHj57hMyRjG5HaKlOZc5GHOTeqe2HJJWnM9Jmqr62iHY4E0grCbOh5ygVgRZ+Eih4OxrjssdWkXW9tG95vdDKXFc9cn7pk1+vl4pFuOMfWs2UQZvgAlilA3hGm6xoAGJtam1h6uCGvlupDzNDCxtjYzckpYjrHPc5YPC11ro+qZ1X2HYwV20F3tbebmak8RBG7CW+sV0Dn72NtPq4vNve0BV5+HY58KOsfCR3tvTGbG\/Xj+XuDp4HtCfX4v8NSAHGNXh1g7mc0ZyxDDPKP7AnQFefc35sEd\/lOs\/XzXp24BC2hLg\/vH8TL9YJ+vH+zztbvG5DZ8rmuGvyPq9hpG0JPjAAAAAElFTkSuQmCC", "footer_text": "ITREX Group", "name": "Ivan Ivanov", "position": ".NET Developer", "summary": { "summary_details": [ "detail1", "detail2", "detail3" ], "technologies": [ "C", "C++", "HTML", "SQL", "JavaScript" ] }, "work_expirience": [ { "dates": { "date_start": "July 2015", "date_end": "September 2015" }, "fields": [ { "name": "Project Name", "value": "Distribution System" }, { "name": "Description", "value": "Standalone application for inventory management and management of Purchase\/Sales orders." }, { "name": "Company", "value": "ITREX Group" }, { "name": "Number of People", "value": "7" }, { "name": "Roles", "value": "Senior Developer \/ DB Architect" }, { "name": "Technologies", "value": ".NET, WPF, JavaScript" }, { "name": "Tools", "value": "MS VS 2015, MS SQL Server 2016, Git, Jira" } ] }, { "dates": { "date_start": "July 2015", "date_end": "September 2015" }, "fields": [ { "name": "Project Name", "value": "Distribution System" }, { "name": "Description", "value": "Standalone application for inventory management and management of Purchase\/Sales orders." }, { "name": "Company", "value": "ITREX Group" }, { "name": "Number of People", "value": "7" }, { "name": "Roles", "value": "Senior Developer \/ DB Architect" }, { "name": "Technologies", "value": ".NET, WPF, JavaScript" }, { "name": "Tools", "value": "MS VS 2015, MS SQL Server 2016, Git, Jira" }, { "name": "Test option", "value": "TEXT text TEXT text TEXT text TEXT text TEXT text TEXT text TEXT text TEXT text " } ] } ], "languages_tools_technologies": { "Programming Languages": [ { "name": "C\/C++", "level": "Advanced", "expirience": "2", "last_used": "2011" }, { "name": "C\/C++", "level": "Advanced", "expirience": "2", "last_used": "2011" }, { "name": "C\/C++", "level": "Advanced", "expirience": "2", "last_used": "2011" }, { "name": "C\/C++", "level": "Advanced", "expirience": "2", "last_used": "2011" }, { "name": "C\/C++", "level": "Advanced", "expirience": "2", "last_used": "2011" }, { "name": "C\/C++", "level": "Advanced", "expirience": "2", "last_used": "2011" }, { "name": "C\/C++", "level": "Advanced", "expirience": "2", "last_used": "2011" }, { "name": "C\/C++", "level": "Advanced", "expirience": "2", "last_used": "2011" } ], "Programming Technologies": [ { "name": "C\/C++", "level": "Advanced", "expirience": "2", "last_used": "2011" }, { "name": "C\/C++", "level": "Advanced", "expirience": "2", "last_used": "2011" } ], "Rade, Case, Tools, Applications, Methodologies": [ { "name": "C\/C++", "level": "Advanced", "expirience": "2", "last_used": "2011" }, { "name": "C\/C++", "level": "Advanced", "expirience": "2", "last_used": "2011" } ], "Internet Technologies": [ { "name": "C\/C++", "level": "Advanced", "expirience": "2", "last_used": "2011" }, { "name": "C\/C++", "level": "Advanced", "expirience": "2", "last_used": "2011" } ] }}'
 * in this case json file will be created in folder $LARAVEL_PATH/tmp/
 * than cv pdf file will be created in $LARAVEL_PATH/tmp/ folder too,
 * and you can see full path file in returned json (in console output)
 *
 * Class CreatePdfFile
 * @package App\Console\Commands
 */

class CreatePdfFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     * {json} - you can put filename with full path or can put raw json
     * {outputfile} (optional) you can put name for output file (with full path)
     * WARNING! If file with same name exists - pdf file will be deleted!
     */
    protected $signature = 'cv:generate {json} {outputfile?} {--file} {--raw}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'make pdf cv-file from json. You can input filename (absolute path) or raw json (in this case you should add "--file" option';
    
    

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $snappy = (env('APP_ENV') == 'production') ? new Pdf('/usr/local/bin/wkhtmltopdf') : new Pdf(base_path('vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64'));
        
        $snappy->setOptions([
            'margin-bottom' => 0,
            'margin-left' => 0,
            'margin-right' => 0,
            'margin-top' => 0,
        ]);

        $start_array = json_decode($this->argument('json'), true);
        $html = View::make('resume', ['data' => $start_array])->render();
        $output_file = '/tmp/123.pdf';
        if(file_exists($output_file)){
            unlink($output_file);
        }
        if($this->option('file') ){
    
            $output_file = $this->argument('outputfile');
            if(file_exists($output_file)){
                unlink($output_file);
            }
            $snappy->generateFromHtml($html, $output_file);
            echo 'ok';
        } elseif($this->option('raw')){
            echo $snappy->getOutputFromHtml($html);die;
        }
        $snappy->generateFromHtml($html, $output_file);
        die();

    }
}
