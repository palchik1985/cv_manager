<section class="pages2">
    <div class="container">
        <header class="header">
            <h5>Work experience</h5>
            <img src="{{ $data['logo'] }}" alt="ITRex">
        </header>
        <div class="work">
            <h2>WORK EXPERIENCE</h2>
            @foreach($data_expirience as $expirience_item)
                <h5>{{ $expirience_item['date_start'] }} - {{ $expirience_item['date_end'] }}</h5>
                <ul class="work-list">
                    <li>
                        <p>Project Name:</p>
                        <span>{{ $expirience_item['project_name'] }}</span>
                    </li>
                    <li>
                        <p>Description</p>
                        <span>{{ $expirience_item['description'] }}</span>
                    </li>
                    <li>
                        <p>Company</p>
                        <span>{{ $expirience_item['company'] }}</span>
                    </li>
                    <li>
                        <p>Number of People</p>
                        <span>{{ $expirience_item['number_of_people'] }}</span>
                    </li>
                    <li>
                        <p>Roles</p>
                        <span>{{ $expirience_item['roles'] }}</span>
                    </li>
                    <li>
                        <p>Technologies</p>
                        <span>{{ $expirience_item['technologies'] }}</span>
                    </li>
                    <li>
                        <p>Tools</p>
                        <span>{{ $expirience_item['tools'] }}</span>
                    </li>
                </ul>
            @endforeach

        </div>
        <footer class="footer">
            <h5>ITRex Group</h5>
        </footer>
    </div>
</section><!--end pages2-->
