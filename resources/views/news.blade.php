<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>G-News!</title>
  </head>
  <body>

    <div class="container">
      <div class="row">
        <div class="offset-2 col-md-8">
          <h1 class="mb-2">G-News</h1>

          <div>
            <form class="form-vertical" method="GET" action="{{ route('fetchNews') }}">
            <div class="form-group mb-3">
                <label for="selectInput" class="col-sm-2 control-label">Search by country:</label>
                <div class="col-md-10">
                    <select name="country" class="form-control" id="country">
                        <option value="">Select country</option>
                        <option value="us">United States</option>
                        <option value="uk">United Kingdom</option>
                        <option value="in">India</option>
                        <option value="fr">French</option>
                    </select>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="selectInput" class="col-sm-2 control-label">Search by language:</label>
                <div class="col-sm-10">
                    <select name="lang" class="form-control" id="lang">
                        <option value="">Select Language</option>
                        <option value="en">English</option>
                        <option value="hi">Hindi</option>
                        <option value="fr">French</option>
                    </select>
                </div>
            </div>
            <div class="form-group mb-3">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
          </div>
          @if(count($articles) > 0)
          @foreach($articles as $artical)
          <div class="card mb-3" style="max-width: 840px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="{{ $artical['image'] }}" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{ $artical['title'] }}</h5>
                  <p class="card-text">{{ $artical['description'] }}</p>
                  <p class="card-text"><small class="text-muted">{{ date("d, M Y", strtotime($artical['publishedAt'])) }}</small></p>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          @else
          <h3>Your Searching data not found</h3>
          @endif
        </div>
      </div>
    </div>

    
  </body>
</html>
