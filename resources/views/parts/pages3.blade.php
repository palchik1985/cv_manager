<section class="pages3">
    <div class="container">
        <header class="header">
            <h5>Programming languages <span>Tools, applications, methodologies</span></h5>
            <img src="{{ url('/') }}/img/itrex-logo.svg" alt="ITRex">
        </header>
        <div class="program">

            @foreach($languages_tools_technologies as $section)
                <h2>{{ strtoupper($section['name']) }}</h2>
                <table>
                    <tr>
                        <th class="col-1">Name</th>
                        <th class="col-2">Level</th>
                        <th class="col-3">Experience <span>years</span></th>
                        <th class="col-4">Last used <span>year</span></th>
                    </tr>
                    @foreach($section['fields'] as $block)
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
            <h5>{{ $data['footer_text'] }}</h5>
        </footer>
    </div>
</section><!--end pages3-->
