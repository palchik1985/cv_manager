<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create resume</title>
    <style>
        body {
            font-size: 18px;
        }
        h2 {
            font-size: 24px;
        }
        button {
            font-size: 18px;
            padding: 5px;
        }
    </style>
</head>
<body>
<h2>Json code for resume:</h2>
<form method="POST">
    {!! csrf_field() !!}
    <textarea name="json" id="json" cols="100" rows="30" autofocus required ></textarea>
    <p><input type="radio" name="output" value="pdf" checked>Download PDF</p>
    <p><input type="radio" name="output" value="html">Show in browser</p>
    <button type="submit">Go!</button>
</form>

<h2 style="margin-top: 50px;font-style: italic">If you need example, you can copy it here:</h2>
<textarea cols="100" rows="100">
{
  "header_text": "Header text",
  "footer_text": "ITREX Group",
  "name": "Ivan Ivanov",
  "position": ".NET Developer",
  "summary": {
    "summary_details": [
      "detail1",
      "detail2",
      "detail3"
    ],
    "technologies": [
      "C",
      "C++",
      "HTML",
      "SQL",
      "JavaScript"
    ]
  },
  "work_expirience": [
    {
      "dates": {
        "date_start": "July 2015",
        "date_end": "September 2015"
      },
      "fields": [
        {
          "name": "Project Name",
          "value": "Distribution System"
        },
        {
          "name": "Description",
          "value": "Standalone application for inventory management and management of Purchase\/Sales orders."
        },
        {
          "name": "Company",
          "value": "ITREX Group"
        },
        {
          "name": "Number of People",
          "value": "7"
        },
        {
          "name": "Roles",
          "value": "Senior Developer \/ DB Architect"
        },
        {
          "name": "Technologies",
          "value": ".NET, WPF, JavaScript"
        },
        {
          "name": "Tools",
          "value": "MS VS 2015, MS SQL Server 2016, Git, Jira"
        }
      ]
    },
    {
      "dates": {
        "date_start": "July 2015",
        "date_end": "September 2015"
      },
      "fields": [
        {
          "name": "Project Name",
          "value": "Distribution System"
        },
        {
          "name": "Description",
          "value": "Standalone application for inventory management and management of Purchase\/Sales orders."
        },
        {
          "name": "Company",
          "value": "ITREX Group"
        },
        {
          "name": "Number of People",
          "value": "7"
        },
        {
          "name": "Roles",
          "value": "Senior Developer \/ DB Architect"
        },
        {
          "name": "Technologies",
          "value": ".NET, WPF, JavaScript"
        },
        {
          "name": "Tools",
          "value": "MS VS 2015, MS SQL Server 2016, Git, Jira"
        },
        {
          "name": "Test option",
          "value": "TEXT text TEXT text TEXT text TEXT text TEXT text TEXT text TEXT text TEXT text "
        }
      ]
    }
  ],
  "languages_tools_technologies": {
    "Programming Languages": [
      {
        "name": "C\/C++",
        "level": "Advanced",
        "expirience": "2",
        "last_used": "2011"
      },
      {
        "name": "C\/C++",
        "level": "Advanced",
        "expirience": "2",
        "last_used": "2011"
      },
      {
        "name": "C\/C++",
        "level": "Advanced",
        "expirience": "2",
        "last_used": "2011"
      },
      {
        "name": "C\/C++",
        "level": "Advanced",
        "expirience": "2",
        "last_used": "2011"
      },
      {
        "name": "C\/C++",
        "level": "Advanced",
        "expirience": "2",
        "last_used": "2011"
      },
      {
        "name": "C\/C++",
        "level": "Advanced",
        "expirience": "2",
        "last_used": "2011"
      },
      {
        "name": "C\/C++",
        "level": "Advanced",
        "expirience": "2",
        "last_used": "2011"
      },
      {
        "name": "C\/C++",
        "level": "Advanced",
        "expirience": "2",
        "last_used": "2011"
      }
    ],
    "Programming Technologies": [
      {
        "name": "C\/C++",
        "level": "Advanced",
        "expirience": "2",
        "last_used": "2011"
      },
      {
        "name": "C\/C++",
        "level": "Advanced",
        "expirience": "2",
        "last_used": "2011"
      }
    ],
    "Rade, Case, Tools, Applications, Methodologies": [
      {
        "name": "C\/C++",
        "level": "Advanced",
        "expirience": "2",
        "last_used": "2011"
      },
      {
        "name": "C\/C++",
        "level": "Advanced",
        "expirience": "2",
        "last_used": "2011"
      }
    ],
    "Internet Technologies": [
      {
        "name": "C\/C++",
        "level": "Advanced",
        "expirience": "2",
        "last_used": "2011"
      },
      {
        "name": "C\/C++",
        "level": "Advanced",
        "expirience": "2",
        "last_used": "2011"
      }
    ]
  }
}
</textarea>
</body>
</html>



