@extends('web.layouts.layout')

@section('content')
<section class="result text-center">
    <div class="container">
        <h1 class="pb-2 ">My lniks</h1>
        <div class="row">
            <div class="col-md-12">
                @if(isset($_SESSION['msg']))
                <div class="alert alert-info">{{ $_SESSION['msg']  }}</div>
                @php
                unset($_SESSION['msg']);
                @endphp
                @endif
                @if(isset($_SESSION['message']))
                <div class="alert alert-danger">{{ $_SESSION['message']  }}</div>
                @php
                unset($_SESSION['message']);
                @endphp
                @endif
                <table class="table">
                    <tr>
                        <th>Full url</th>
                        <th>Shorten url</th>
                        <th>Copy</th>
                        <th>action</th>
                        <th>Clicks Count</th>
                    </tr>
                    @foreach($links as $link)
                    <tr>
                        <td><a href="http://{{ $link->full_url }}" rel="noopener noreferrer">{{ $link->full_url }}</a>
                        </td>
                        <td>
                            <a rel="stylesheet" href="{{ '/link/'. $link->short_url }}" />
                            {{ $link->short_url }}
                        </td>
                        <td>
                            <button onclick="copy('http://{{env('APP_DOMAINE')}}/link/{{ $link->short_url }}')"
                                class="btn text-white">Copy</button>
                        </td>
                        <td>
                            <form action="/links/{{$link->id}}/delete" method="post">
                                <button type="submit" class="btn btn-danger delete_confirmation">Delete</a>
                            </form>
                        </td>
                        <td>{{$link->views}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
</section>

@include('admin.dashbord.delete_modal')

@endsection

@section('js')
<script>
    function copy(text) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(text).select();
            document.execCommand("copy");
            $temp.remove();
        } ;
        
</script>
@endsection