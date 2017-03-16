<section class="pages3">
    <div class="container">
        <header class="header">
            <h5>Programming languages <span>Tools, applications, methodologies</span></h5>
            <img src="{{ $data['logo'] }}" alt="ITRex">
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
