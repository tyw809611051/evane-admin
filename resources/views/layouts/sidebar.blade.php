<div class="sidebar-wrapper">
        
        <div class="user">
            <div class="photo">
                <img src="{{ asset('img/avatar.jpg') }}" />
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>
                       静爷
        
                    </span>
                </a>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="/">
                    <i class="material-icons">dashboard</i>
                    <p> 网站统计 </p>
                </a>
            </li>
            
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#articleExamples">
                    <i class="material-icons">book</i>
                    <p> 文章管理 
                    <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse" id="articleExamples">
                    <ul class="nav">
                        <li class="nav-item 
                        @if (Request::path() == 'article/add')
                            active
                        @endif">
                            <a class="nav-link" href="{{url('article/add')}}">
                              <span class="sidebar-mini"> 新 </span>
                              <span class="sidebar-normal"> 新的文章 </span>
                            </a>
                        </li>
                        <li class="nav-item 
                        @if (Request::path() == 'article/index')
                            active
                        @endif 
                        ">
                            <a class="nav-link" href="{{url('article/index')}}">
                              <span class="sidebar-mini"> 文章 </span>
                              <span class="sidebar-normal"> 文章管理 </span>
                            </a>
                        </li>
                        <li class="nav-item 
                        @if (Request::path() == 'category/index')
                            active
                        @endif 
                        ">
                            <a class="nav-link" href="{{url('category/index')}}">
                              <span class="sidebar-mini"> 分类 </span>
                              <span class="sidebar-normal"> 分类管理 </span>
                            </a>
                        </li>
                        <li class="nav-item 
                        @if (Request::path() == 'feature/index')
                            active
                        @endif 
                        ">
                            <a class="nav-link" href="{{url('feature/index')}}">
                              <span class="sidebar-mini"> 版块 </span>
                              <span class="sidebar-normal"> 版块管理 </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#commentExamples">
                    <i class="material-icons">comment</i>
                    <p> 评论管理 
                    <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse" id="commentExamples">
                    <ul class="nav">
                        <li class="nav-item 
                        @if (Request::path() == 'comment/index')
                            active
                        @endif
                        ">
                            <a class="nav-link" href="{{url('comment/index')}}">
                              <span class="sidebar-mini"> 评 </span>
                              <span class="sidebar-normal"> 评论列表 </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#messageExamples">
                    <i class="material-icons">message</i>
                    <p> 留言管理 
                    <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse" id="messageExamples">
                    <ul class="nav">
                        <li class="nav-item @if (Request::path() == 'message/index')
                            active
                        @endif">
                            <a class="nav-link" href="{{url('message/index')}}">
                              <span class="sidebar-mini"> 留 </span>
                              <span class="sidebar-normal"> 留言列表 </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#memberExamples">
                    <i class="material-icons">people_outline</i>
                    <p> 用户管理 
                    <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse" id="memberExamples">
                    <ul class="nav">
                        <li class="nav-item @if (Request::path() == 'member/index')
                            active
                        @endif">
                            <a class="nav-link" href="{{url('member/index')}}">
                              <span class="sidebar-mini"> 用 </span>
                              <span class="sidebar-normal"> 用户列表 </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#aboutExamples">
                    <i class="material-icons">bubble_chart</i>
                    <p> 关于管理 
                    <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse" id="aboutExamples">
                    <ul class="nav">
                        <li class="nav-item 
                        @if (Request::path() == 'user/index')
                            active
                        @endif
                        ">
                            <a class="nav-link" href="{{url('user/index')}}">
                              <span class="sidebar-mini"> 用 </span>
                              <span class="sidebar-normal"> 用户管理 </span>
                            </a>
                        </li>
                        <li class="nav-item 
                        @if (Request::path() == 'role/index')
                            active
                        @endif">
                            <a class="nav-link" href="{{url('role/index')}}">
                              <span class="sidebar-mini"> 角 </span>
                              <span class="sidebar-normal"> 角色管理 </span>
                            </a>
                        </li>
                        <li class="nav-item 
                        @if (Request::path() == 'permission/index')
                            active
                        @endif">
                            <a class="nav-link" href="{{url('permission/index')}}">
                              <span class="sidebar-mini"> 权 </span>
                              <span class="sidebar-normal"> 权限管理 </span>
                            </a>
                        </li>
                        <li class="nav-item 
                        @if (Request::path() == 'operate/index')
                            active
                        @endif">
                            <a class="nav-link" href="{{url('operate/index')}}">
                              <span class="sidebar-mini"> 操 </span>
                              <span class="sidebar-normal"> 操作记录 </span>
                            </a>
                        </li>
                        <li class="nav-item @if (Request::path() == 'cache/index')
                            active
                        @endif">
                            <a class="nav-link" href="{{url('cache/index')}}">
                              <span class="sidebar-mini"> 缓 </span>
                              <span class="sidebar-normal"> 缓存管理 </span>
                            </a>
                        </li>
                        <li class="nav-item @if (Request::path() == 'record/index')
                            active
                        @endif">
                            <a class="nav-link" href="{{url('record /index')}}">
                              <span class="sidebar-mini"> 日 </span>
                              <span class="sidebar-normal"> 日志管理 </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#systemExamples">
                    <i class="material-icons">settings_applications</i>
                    <p> 系统设置 
                    <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse" id="systemExamples">
                    <ul class="nav">
                        <li class="nav-item @if (Request::path() == 'setting/index')
                            active
                        @endif">
                            <a class="nav-link" href="{{url('setting/index')}}">
                              <span class="sidebar-mini"> P </span>
                              <span class="sidebar-normal"> Pricing </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>