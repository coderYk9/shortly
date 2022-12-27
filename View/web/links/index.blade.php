@extends('web.layouts.layout')

@section('content')
<section class="result text-center">
    <div class="container">
        <h1 class="pb-2 ">My lniks</h1>
        <div class="row">
            <div class="col-md-12">
                @if(isset($_SESSION['msg']))
                <div class="alert alert-info">{{ $_SESSION['msg'] }}</div>
                @endif
                <table class="table">
                    <tr>
                        <th>Full url</th>
                        <th>Shorten url</th>
                        <th>Copy</th>
                        <th>Clicks Count</th>
                    </tr>
                    @foreach($links['data'] as $link)
                    <tr>
                        <td>{{ $link->full_link }}</td>
                        <td>{{ url('link/'.$link->short_link) }}</td>
                        <td>
                            <button onclick="copy('{{ url('link/' . $link->short_link) }}')"
                                class="btn text-white">Copy</button>
                            <a href="#" data-action="{{ url('link/' . $link->id . '/delete') }}"
                                class="btn delete_confirmation" data-toggle="modal"
                                data-target="#deleteModal">Delete</a>
                        </td>
                        <td>5</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

        {!! links($links['current_page'], $links['pages']) !!}
    </div>
</section>

@include('web.layouts.delete_modal')
@endsection

@section('js')
<script>
    function copy(text) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(text).select();
            document.execCommand("copy");
            $temp.remove();
        }
</script>
@endsection