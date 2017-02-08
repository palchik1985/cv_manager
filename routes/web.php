<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    
    return view('welcome');
});

Route::get('/test', function () {
    
    $start_array = [
        'header_text' => 'Header text',
        'logo' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAAAmCAYAAADOZxX5AAAD8ElEQVR4nO1b3XGjMBC+EiiBEujg0kHoIO7g3MG5g0sHdgeL84KkF/ykzfCCO3A6sDvIPfBjAQtIQrqZs/XNaJJAWK30af+E+PHDI0CUCQjcAJcp5PjS+53jrv4p0+Za7FOXgBlAUUXAZQoCNyDKRPs5leCiinzqGKCgnfTVcoLl+QeIMgkW8h+hjUu+5B85vgWrc4g6dunHLSPZRRVlXELG8Tvj+J0x3EOOLz76ehrU2aAnwkSZZFxWHWG9Jqsjxzcf/T402hjmRTaXacbllSasR971yPF3iKOaACa3TuXlGB/Z56+eOzRpteuMXer0UACBGxerWyFqwg2aNeC4czC8xwMUVbTGylwQBRzPwOQ7cDwH0jRgU4t5sKhTJ7vdfWHyHQRuXI/3IaA7Ma6JGsSvS4hfjuCVKCJz1M1eQZTJh5A/2wZFFal/27ZRPwZyqf+lFiLkGFPPriNKlMmRyz8Zw4sPcoDjDTjuQOAGmMzIrHFhEMDx1JOZ44sri1dLDhO5jV6HkQdRxtJsLvRKH+B46G7eJ0VeM4aFZvNClKogufq4TIHjATjegMmvpQLfG2l3q6+gqCJT0hrdzqSsmrCex1JjeX+APQL9EbJIGJPvc0So+i7+z5A0USbA8aS086Dvr8F9qt2G+g5Jm5PTm2+COIKws5Zb7AgcCfVMWOsCHGFI2uj+cLI1SofaEvpWMLI0hnudeEgTZ0EYMbAYmNz6JnDSBayAF9JyjBdJm2mUvKH1NnJvTrbpFAIPlKtYQZjxitKaYEvSQJTJZDwf675bQ1rdH25Gcn3XnvfzHrgzJdTWBeik/dakaZIAHM+kHI2Y1ulQVBGd2NWJiem89AZn/Eztr5eJY3hRV7J2DaaxpeaTNDVhsnGz7RzN17YriLPdcwSOO3N3Ka867+p03Icr0uh4fp9QIhG5TLlXtX8yUxz2NXhGG7b+dZhpTbiYU+1WZXqf5Hni2ux2sX93pO2acmHgOWo9bWJaxnBPhQkyo2S4N5/8RjHj57hMyRjG5HaKlOZc5GHOTeqe2HJJWnM9Jmqr62iHY4E0grCbOh5ygVgRZ+Eih4OxrjssdWkXW9tG95vdDKXFc9cn7pk1+vl4pFuOMfWs2UQZvgAlilA3hGm6xoAGJtam1h6uCGvlupDzNDCxtjYzckpYjrHPc5YPC11ro+qZ1X2HYwV20F3tbebmak8RBG7CW+sV0Dn72NtPq4vNve0BV5+HY58KOsfCR3tvTGbG/Xj+XuDp4HtCfX4v8NSAHGNXh1g7mc0ZyxDDPKP7AnQFefc35sEd/lOs/XzXp24BC2hLg/vH8TL9YJ+vH+zztbvG5DZ8rmuGvyPq9hpG0JPjAAAAAElFTkSuQmCC',
        'footer_text' => 'ITREX Group',
        'name' => 'Ivan Ivanov',
        'position' => '.NET Developer',
        'summary' => [
            'summary_details' => [
                'detail1',
                'detail2',
                'detail3',
            ],
            'technologies' => [
                'C',
                'C++',
                'HTML',
                'SQL',
                'JavaScript'
            ],
        ],
        'work_expirience' => [
            [
                'date_start' => 'July 2015',
                'date_end' => 'September 2015',
                'project_name' => 'Distribution System',
                'description' => 'Standalone application for inventory management and management of Purchase/Sales orders.',
                'company' => 'ITREX Group',
                'number_of_people' => '7',
                'roles' => 'Senior Developer / DB Architect',
                'technologies' => '.NET, WPF, JavaScript',
                'tools' => 'MS VS 2015, MS SQL Server 2016, Git, Jira'
            ],
            [
                'date_start' => 'July 2015',
                'date_end' => 'September 2015',
                'project_name' => 'Distribution System',
                'description' => 'Standalone application for inventory management and management of Purchase/Sales orders.',
                'company' => 'ITREX Group',
                'number_of_people' => '7',
                'roles' => 'Senior Developer / DB Architect',
                'technologies' => '.NET, WPF, JavaScript',
                'tools' => 'MS VS 2015, MS SQL Server 2016, Git, Jira'
            ],
            [
                'date_start' => 'July 2015',
                'date_end' => 'September 2015',
                'project_name' => 'Distribution System',
                'description' => 'Standalone application for inventory management and management of Purchase/Sales orders.',
                'company' => 'ITREX Group',
                'number_of_people' => '7',
                'roles' => 'Senior Developer / DB Architect',
                'technologies' => '.NET, WPF, JavaScript',
                'tools' => 'MS VS 2015, MS SQL Server 2016, Git, Jira'
            ],
        ],
        'languages_tools_technologies' => [
            'Programming Languages' => [
                [
                    'name' => 'C/C++',
                    'level' => 'Advanced',
                    'expirience' => '2',
                    'last_used' => '2011',
                ],
                [
                    'name' => 'C/C++',
                    'level' => 'Advanced',
                    'expirience' => '2',
                    'last_used' => '2011',
                ],
                [
                    'name' => 'C/C++',
                    'level' => 'Advanced',
                    'expirience' => '2',
                    'last_used' => '2011',
                ],
                [
                    'name' => 'C/C++',
                    'level' => 'Advanced',
                    'expirience' => '2',
                    'last_used' => '2011',
                ],
                [
                    'name' => 'C/C++',
                    'level' => 'Advanced',
                    'expirience' => '2',
                    'last_used' => '2011',
                ],
                [
                    'name' => 'C/C++',
                    'level' => 'Advanced',
                    'expirience' => '2',
                    'last_used' => '2011',
                ],
                [
                    'name' => 'C/C++',
                    'level' => 'Advanced',
                    'expirience' => '2',
                    'last_used' => '2011',
                ],
                [
                    'name' => 'C/C++',
                    'level' => 'Advanced',
                    'expirience' => '2',
                    'last_used' => '2011',
                ],
            ],
            'Programming Technologies' => [
                [
                    'name' => 'C/C++',
                    'level' => 'Advanced',
                    'expirience' => '2',
                    'last_used' => '2011',
                ],
                [
                    'name' => 'C/C++',
                    'level' => 'Advanced',
                    'expirience' => '2',
                    'last_used' => '2011',
                ],
            ],
            'Rade, Case, Tools, Applications, Methodologies' => [
                [
                    'name' => 'C/C++',
                    'level' => 'Advanced',
                    'expirience' => '2',
                    'last_used' => '2011',
                ],
                [
                    'name' => 'C/C++',
                    'level' => 'Advanced',
                    'expirience' => '2',
                    'last_used' => '2011',
                ],
            ],
            'Internet Technologies' => [
                [
                    'name' => 'C/C++',
                    'level' => 'Advanced',
                    'expirience' => '2',
                    'last_used' => '2011',
                ],
                [
                    'name' => 'C/C++',
                    'level' => 'Advanced',
                    'expirience' => '2',
                    'last_used' => '2011',
                ],
            ],
        ]
    ];
    
    header('Content-Type: json');
    echo json_encode($start_array, JSON_PRETTY_PRINT);die;
    return view('resume', ['data' => $start_array]);
    
    
    
    
    
//    $html = '<h1>LKJDS:FLJK</h1><p>asldfjasjdflasjdfsladfkj</p>';
//    $snappy = App::make('snappy.pdf');
//    $snappy->generate('http://github.com', '/tmp/github.pdf');
//    return new Response(
//        $snappy->getOutputFromHtml($html),
//        200,
//        [
//            'Content-Type'          => 'application/pdf',
//            'Content-Disposition'   => 'attachment; filename="snappy.pdf"'
//        ]
//    );
});
