
<section class="pages1">
    <div class="container">
        <header class="header">
            <div class="header-top">
                <h5>{{ $data['header_text'] }}</h5>
                <img src="{{ url('/') }}/img/grey-logo.svg" alt="BIG DIG" style="margin: 13px 42px 0 0;">
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
            @if(!isset($data['summary']['technologies_block_enabled']) || (isset($data['summary']['technologies_block_enabled']) && $data['summary']['technologies_block_enabled'] == true))
                <h3>{{ isset($data['summary']['technologies_block_name']) ? strtoupper($data['summary']['technologies_block_name']) : 'Summary Technologies'}}</h3>
                <div class="column1"
                @if(count($data['summary']['technologies']) > 20)
                    style="column-count:2;"
                @endif
                >
                    @foreach($data['summary']['technologies'] as $line)
                        <p>{{$line}}</p>
                    @endforeach
                </div>
            @endif
        </div>
        <footer class="footer">
            <h5>{{ $data['footer_text'] }}</h5>
        </footer>
    </div>
</section><!--end pages1-->
