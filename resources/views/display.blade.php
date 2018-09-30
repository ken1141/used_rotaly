<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>ロータリー中古車一覧</title>
</head>
<body>
    <div class="container">

        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">車名</th>
                <th scope="col">グレード</th>
                <th scope="col">年式</th>
                <th scope="col">価格</th>
                <th scope="col">走行距離</th>
                <th scope="col">都道府県</th>
                <th scope="col">カラー</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $data)
            <tr>
                <td>{{ $data->name }}</td>
                <td>{{ $data->grade }}</td>
                <td>{{ $data->year }}</td>
                @if(is_numeric($data->price))
                    <td>{{ number_format($data->price) }}</td>
                    @else
                    <td>応談</td>
                @endif
                <td>{{ $data->odd }}</td>
                <td>{{ $data->pref }}</td>
                <td>{{ $data->color }}</td>
                <td><a href="https://www.carsensor.net/usedcar/detail/{{ $data->data_id }}/index.html" target="_blank">詳細を見る</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>

        {{ $list->links() }}
    </div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>