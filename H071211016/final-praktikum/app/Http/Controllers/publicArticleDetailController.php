<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\article;
use App\Models\articleTag;
use App\Models\publicArticleDetail;
use App\Models\publicArticleDetailTag;
use Illuminate\Support\Facades\DB;


class publicArticleDetailController extends Controller
{
    public function showPublicArticleDetail($id)
    {
        $data1 = DB::table('articles')->find($id);
        $data3 = DB::table('categories')->where('id', $data1->category_id)->get();
        $data4 = publicArticleDetailTag::where('article_id', $data1->id)->get();
        $data5 = articleTag::where('article_id', $data1->id)->get();
        $data6 = DB::table('sub_category')->where('id', $data1->sub_category_id)->get();
        $data7 = publicArticleDetail::where('id','=', $data1->member_id)->get();
        return view('publicArticleDetail')
            -> with(compact('data1'))
            -> with(compact('data3'))
            -> with(compact('data4'))
            -> with(compact('data5'))
            -> with(compact('data6'))
            -> with(compact('data7'));
    }
}
