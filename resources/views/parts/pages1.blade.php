
<section class="pages1">
    <div class="container">
        <header class="header">
            <div class="header-top">
                <h5>{{ $data['header_text'] }}</h5>
                <img src="{{ url('/') }}/img/logo.png" alt="ITRex">
            </div>
            <h2>{{ $data['name'] }}</h2>
            <p>{{ $data['position'] }}</p>
        </header>
        <div class="summary">
            <h2>SUMMARY</h2>
            <ul class="sum-list">
                @foreach($data['summary']['summary_details'] as $line)
                    <li>{{$line}}</li>
                @endforeach
            </ul>
            <h3>TECHNOLOGIES</h3>
            @foreach($data['summary']['technologies'] as $line)
                <p>{{$line}}</p>
            @endforeach
        </div>
        <footer class="footer">
            <h5>ITRex Group</h5>
        </footer>
    </div>
</section><!--end pages1-->
