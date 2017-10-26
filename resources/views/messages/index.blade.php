@extends('home')
@section('content')
<div class="container">
        <div>
            <div class="panel panel-warning">
            <h2 class="panel-heading">Hi {{ Auth::user()->name }}! 說點什麼吧：</h2>
                <div class="panel-body">
                    <form action="{{ url('message') }}" method="POST">
                        {{ csrf_field() }}
                        <textarea name="body" id="message-body" class="form-control"></textarea></br>
                        <button type="submit" class="btn btn-primary">留言</button>
                    </form>
                    @foreach ($messages as $message)
                        <!--全部留言-->
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <i class="glyphicon glyphicon-user"></i>  {{ $message->user()->first()->name}}:
                            </div>
                            <div class="panel-body">         
                                <p  style="font-size:20px">{{ $message->body }}</p>                       
                                <div>( Post at: {{ $message->created_at }} )</div>
                                @if($message->created_at != $message->updated_at )
                                <div>( Edit at: {{ $message->updated_at }} )</div>
                                @endif
                                @if($message->user()->first() == Auth::user())
                                <!--編輯留言-->
                                
                                <form action="{{ url('messages/'.$message->id.'/edit') }}" method="GET">
                                    <button type="submit" id="edit-message-{{ $message->id }}" class="btn btn-primary">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </button>
                                </form>
                                <!--刪除留言-->
                                <form action="{{ url('message/'.$message->id) }}" method="POST">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button type="submit" id="delete-message-{{ $message->id }}" class="btn btn-danger">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </button>
                                </form></br>
                                @endif
                                <!--顯示回覆-->
                                    <ul class="list-group">
                                    @foreach ($message->comments as $comment)
                                    <li class= "list-group-item">
                                    @if($comment->user()->first() == Auth::user())
                                    <form action="{{ url('comment/'.$comment->id) }}" method="POST">
                                    {!! csrf_field() !!}
                                    {!! method_field('DELETE') !!}
                                    <button type="submit" id="delete-comment-{{ $comment->id }}" class="btn btn-danger">
                                    <i class="glyphicon glyphicon-trash"></i></button>
                                    @endif
                                      {{ $comment->body }}</li>
                                    @endforeach
                                    </ul>

                                <form method="POST" action="/messages/{{ $message->id}}/comments">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <textarea name="body" class="form-control"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">新增回覆</button>
                                    </div>
                                </form>

{{--  
                                <!--顯示回覆-->
                                @foreach ($message->comments as $comment)
                                <li>{{$comment->body}}</li>
                                @endforeach
                                <!--新增回覆-->
                                <form action="/messages/{{ $msessage->id}}/comments" method="POST">
                                    {{ csrf_field() }}
                                    <textarea name="body" id="comment-body" class="form-control"></textarea></br>
                                    <button type="submit" class="btn btn-primary">新增回覆</button>
                                </form>  --}}
                            </div>
                            
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
</div>
@endsection