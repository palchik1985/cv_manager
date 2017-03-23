<section class="pages3">
    <div class="container">
        <header class="header">
            <h5>Programming languages <span>Tools, applications, methodologies</span></h5>
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAAAmCAYAAADOZxX5AAAD8ElEQVR4nO1b3XGjMBC+EiiBEujg0kHoIO7g3MG5g0sHdgeL84KkF/ykzfCCO3A6sDvIPfBjAQtIQrqZs/XNaJJAWK30af+E+PHDI0CUCQjcAJcp5PjS+53jrv4p0+Za7FOXgBlAUUXAZQoCNyDKRPs5leCiinzqGKCgnfTVcoLl+QeIMgkW8h+hjUu+5B85vgWrc4g6dunHLSPZRRVlXELG8Tvj+J0x3EOOLz76ehrU2aAnwkSZZFxWHWG9Jqsjxzcf/T402hjmRTaXacbllSasR971yPF3iKOaACa3TuXlGB/Z56+eOzRpteuMXer0UACBGxerWyFqwg2aNeC4czC8xwMUVbTGylwQBRzPwOQ7cDwH0jRgU4t5sKhTJ7vdfWHyHQRuXI/3IaA7Ma6JGsSvS4hfjuCVKCJz1M1eQZTJh5A/2wZFFal/27ZRPwZyqf+lFiLkGFPPriNKlMmRyz8Zw4sPcoDjDTjuQOAGmMzIrHFhEMDx1JOZ44sri1dLDhO5jV6HkQdRxtJsLvRKH+B46G7eJ0VeM4aFZvNClKogufq4TIHjATjegMmvpQLfG2l3q6+gqCJT0hrdzqSsmrCex1JjeX+APQL9EbJIGJPvc0So+i7+z5A0USbA8aS086Dvr8F9qt2G+g5Jm5PTm2+COIKws5Zb7AgcCfVMWOsCHGFI2uj+cLI1SofaEvpWMLI0hnudeEgTZ0EYMbAYmNz6JnDSBayAF9JyjBdJm2mUvKH1NnJvTrbpFAIPlKtYQZjxitKaYEvSQJTJZDwf675bQ1rdH25Gcn3XnvfzHrgzJdTWBeik/dakaZIAHM+kHI2Y1ulQVBGd2NWJiem89AZn/Eztr5eJY3hRV7J2DaaxpeaTNDVhsnGz7RzN17YriLPdcwSOO3N3Ka867+p03Icr0uh4fp9QIhG5TLlXtX8yUxz2NXhGG7b+dZhpTbiYU+1WZXqf5Hni2ux2sX93pO2acmHgOWo9bWJaxnBPhQkyo2S4N5/8RjHj57hMyRjG5HaKlOZc5GHOTeqe2HJJWnM9Jmqr62iHY4E0grCbOh5ygVgRZ+Eih4OxrjssdWkXW9tG95vdDKXFc9cn7pk1+vl4pFuOMfWs2UQZvgAlilA3hGm6xoAGJtam1h6uCGvlupDzNDCxtjYzckpYjrHPc5YPC11ro+qZ1X2HYwV20F3tbebmak8RBG7CW+sV0Dn72NtPq4vNve0BV5+HY58KOsfCR3tvTGbG/Xj+XuDp4HtCfX4v8NSAHGNXh1g7mc0ZyxDDPKP7AnQFefc35sEd/lOs/XzXp24BC2hLg/vH8TL9YJ+vH+zztbvG5DZ8rmuGvyPq9hpG0JPjAAAAAElFTkSuQmCC" alt="ITRex">
        </header>
        <div class="program">

            @foreach($languages_tools_technologies as $name => $section)
                <h2>{{ strtoupper($name) }}</h2>
                <table>
                    <tr>
                        <th class="col-1">Name</th>
                        <th class="col-2">Level</th>
                        <th class="col-3">Experience <span>years</span></th>
                        <th class="col-4">Last used <span>year</span></th>
                    </tr>
                    @foreach($section as $block)
                        <tr>
                            @foreach($block as $item)
                                    <td>{{ $item }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </table>

            @endforeach

        </div>
        <footer class="footer">
            <h5>ITRex Group</h5>
        </footer>
    </div>
</section><!--end pages3-->
