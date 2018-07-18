<div class="col-sm-12 col-md-7">
              <div class="dataTables_paginate paging_full_numbers" id="datatables_paginate">
                  <ul class="pagination">
              <li class="paginate_button page-item first" id="datatables_first">
                <a href="{{$paginator->url(1)}}" aria-controls="datatables" data-dt-idx="0" tabindex="0" class="page-link">第一页</a>
              </li>
              @if (!empty($paginator->previousPageUrl()))
              <li class="paginate_button page-item previous" id="datatables_previous">
                <a href="{{$paginator->previousPageUrl()}}" aria-controls="datatables" data-dt-idx="1" tabindex="0" class="page-link">上一页</a>
              </li>
              @endif
              @for($i=1;$i<=$paginator->lastPage();$i++)
              <li class="paginate_button page-item 
                @if ($paginator->currentPage() == $i)
                  active
                @endif
              ">
                <a href="{{$paginator->url($i)}}" aria-controls="datatables" data-dt-idx="2" tabindex="0" class="page-link">{{$i}}</a>
              </li>
              @endfor
   
              @if ($paginator->hasMorePages())
              <li class="paginate_button page-item next " id="datatables_next">
                <a href="{{$paginator->nextPageUrl()}}" aria-controls="datatables" data-dt-idx="6" tabindex="0" class="page-link">下一页</a>
              </li>
              @endif
              <li class="paginate_button page-item last " id="datatables_last"><a href="{{$paginator->url($paginator->lastPage())}}" aria-controls="datatables" data-dt-idx="7" tabindex="0" class="page-link">最后一页</a>
              </li>
            </ul>
          </div>
            </div>