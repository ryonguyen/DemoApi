

@extends('layouts.app')

@section('content')
<section class="content">
    <div class="container">
        <div class="row">
            <table id="mytable" class="table table-bordred table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th></th>
                    <th>Title</th>
                    <th>Contents</th>
                    <th class="hidden-phone">Time Create</th>
                    <th class="hidden-phone">Time Update</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                    @foreach($items as $i => $item)
                        <tr>
                            <td>{{$i}}</td>
                            <td><input type="checkbox" class="checkthis" /></td>
                            <td>
                                <a href="{{ $item->_link}}" class="truncate"> {{ (strlen($item->title) > 200) ? substr($item->title,0,200) : $item->title }}</a>
                            </td>
                            <td>
                                {{ (strlen($item->body) > 200) ? substr($item->body,0,200) : $item->body }}
                            </td>
                            <td>{{ $item->createDate }}</td>
                            <td>{{ $item->updateDate }}</td>
                            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                            <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>

<script type="text/javascript">

            $("#mytable #checkall").click(function () {
                if ($("#mytable #checkall").is(':checked')) {
                    $("#mytable input[type=checkbox]").each(function () {
                        $(this).prop("checked", true);
                    });

                } else {
                    $("#mytable input[type=checkbox]").each(function () {
                        $(this).prop("checked", false);
                    });
                }
            });

            $("[data-toggle=tooltip]").tooltip();


</script>
@endsection
