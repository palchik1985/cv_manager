<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<h1>{{ $data['header_text'] }}</h1>
<img src="{{ $data['logo'] }}" alt="">

<h2 class="name">{{ $data['name'] }}</h2>
<h3 class="position">{{ $data['position'] }}</h3>

<h2 class="summary">SUMMARY</h2>
<ul class="summary_details">
    @foreach($data['summary']['summary_details'] as $line)
        <li class="summary_line">{{$line}}</li>
    @endforeach
</ul>
<h3>TECHNOLOGIES</h3>
<ul class="summary_technologies">
    @foreach($data['summary']['technologies'] as $line)
        <li class="technology_line">{{$line}}</li>
    @endforeach
</ul>

<h2 class="expirience">WORK EXPIRIENCE</h2>
<ul class="expirience_item">
    @foreach($data['work_expirience'] as $expirience_item)
        <li class="technology_item">
            <p class="date">{{ $expirience_item['date_start'] }} - {{ $expirience_item['date_end'] }}</p>
            <ul>
                <li>
                    <div>Project Name:</div>
                    <div>{{ $expirience_item['project_name'] }}</div>
                </li>
                <li>
                    <div>Description</div>
                    <div>{{ $expirience_item['description'] }}</div>
                </li>
                <li>
                    <div>Company</div>
                    <div>{{ $expirience_item['company'] }}</div>
                </li>
                <li>
                    <div>Number of People</div>
                    <div>{{ $expirience_item['number_of_people'] }}</div>
                </li>
                <li>
                    <div>Roles</div>
                    <div>{{ $expirience_item['roles'] }}</div>
                </li>
                <li>
                    <div>Technologies</div>
                    <div>{{ $expirience_item['technologies'] }}</div>
                </li>
                <li>
                    <div>Tools</div>
                    <div>{{ $expirience_item['tools'] }}</div>
                </li>
            </ul>
        </li>
    @endforeach
</ul>

@foreach($data['languages_tools_technologies'] as $name => $section)
    <h3 class="section_name">{{ $name }}</h3>
    <table>
        <tr>
            <th>Name</th>
            <th>Level</th>
            <th>Expirience <span>years</span></th>
            <th>Last used <span>year</span></th>
        </tr>
        @foreach($section as $block)
            <tr class="technology_line">
                @foreach($block as $item)
                        <td>{{ $item }}</td>
                @endforeach
            </tr>
        @endforeach
    </table>

@endforeach

</body>
</html>