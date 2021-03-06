@extends('admin.public.header')
@section('title',$title)
@section('listcontent')
    <style>
        .imgDiv{
            width: 150px;
            height: 150px;
            line-height: 150px;
            overflow: hidden;
            display: inline-block;
            border: 1px solid #e3e3e3;
            border-radius: 2px;
            margin: 5px;
            position: relative;
            text-align:center;
        }
        .delImag{
            position: absolute;
            top: 0;
            right: 0;
            border: 1px solid #ee4140;
            font-size: 16px;
            display: inline;
            width: 16px;
            height: 16px;
            background: #ff4544;
            color: #fff;
            text-align: center;
            z-index: 2;
            line-height: 16px;
            cursor: pointer;
            opacity: .25;
        }
        .delImag:hover{
            opacity: 1
        }
        .attr-span{
            float: left;
            height: 36px;
            line-height: 36px;
            border-color: #e6e6e6;
            border-width: 1px;
            border-style: solid;
            background-color: #eceeef;
            padding: 0 .7rem;
            border-radius: 0.25rem 0 0 0.25rem;
            color: #464a4c;
        }
        .attr-group-info{
            border: 1px solid #eee;
            padding: .5rem .75rem!important;
            margin-bottom: .5rem;
            border-radius: .15rem;
        }
        .group-info{
            margin-bottom: 10px;
            overflow: hidden;
        }
        .a-del{
            border: 1px solid #ee4140;
            font-size: 16px;
            display: inline-block;
            width: 16px;
            height: 16px;
            background: #ff4544;
            color: #fff;
            text-align: center;
            z-index: 2;
            line-height: 16px;
            cursor: pointer;
            opacity: .25;
        }
        .a-del:hover{
            opacity: 1;
            color: #fff;
        }
        .group-info b, .group-info a{
            float: left;
        }
        .group-info a{
            position: relative;
            top: 3px;
        }
        .attr-group-del{
            margin-left: 3px;
        }
        .attr-info{
            float: left;
            margin-right: 10px;
            margin-bottom: 10px;
        }
        .attr-info b{
            padding: 0 10px;
            float: left;
            background: #eee;
            padding: 0 10px;
            color: #363636;
            font-weight: normal;
            line-height: 26px;
            height: 26px;
        }
        .attr-info a{
            float: left;
            line-height: 24px;
            height: 24px;
            width: 24px;
        }
        .attr-add{
            height: 26px;
            line-height: 26px;
            border-radius: 0 2px 2px 0;
        }
        .attrPicDiv{
            position: relative;
        }
        .attrPic{
            width: 92px;
            height: 38px;
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
        }
    </style>
    <form class="layui-form">
        <div class="layui-form layuimini-form">
            @if(isset($info->id))
            <input type="hidden" name="id" value="{{$info->id}}" />
            @endif

            <fieldset class="layui-elem-field layui-field-title">
                <legend>????????????</legend>
            </fieldset>

            <div class="layui-form-item">
                <label class="layui-form-label required">??????</label>
                <div class="layui-input-block">
                    <div id="goodsCat"></div>
                </div>
            </div>

            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                <legend>????????????</legend>
            </fieldset>

            <div class="layui-form-item">
                <label class="layui-form-label required">????????????</label>
                <div class="layui-input-block">
                    <input type="text" name="name" lay-verify="required" lay-reqtext="????????????????????????" placeholder="?????????????????????" value="{{$info->name ?? ''}}" class="layui-input" />
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label required">??????</label>
                <div class="layui-input-block">
                    <input type="text" name="unit" lay-verify="required" lay-reqtext="??????????????????" placeholder="???????????????" value="{{$info->unit ?? '???'}}" class="layui-input" />
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label required">??????</label>
                <div class="layui-input-block" style="position: relative">
                    <input type="number" min="0" max="99999999" name="weight" lay-verify="required" lay-reqtext="??????????????????" placeholder="???????????????" value="{{$info->weight ?? ''}}" class="layui-input" style="display: inline; width: 50%; position: absolute" />
                    <span style="position: absolute; right: 50%; display: block; line-height: 36px; color: #464a4c; padding: 0 13px; border: 1px solid #e6e6e6; background-color: #eceeef; border-radius: 2px;">???</span>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label required">????????????</label>
                <div class="layui-input-block">
                    <input type="number" min="0" name="virtual_sales" lay-verify="required" lay-reqtext="????????????????????????" placeholder="?????????????????????" value="{{$info->virtual_sales ?? '0'}}" class="layui-input" />
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label required">???????????????</label>
                <div class="layui-input-block">
                    <div class="layui-upload-drag" id="upload1">
                        <i class="layui-icon">???</i>
                        <p>??????????????????????????????????????????</p>
                        <br>
                        <div class="{{$info->show_pic ? '' : 'layui-hide'}}" id="uploadShowImg">
                            <img src="{{$info->show_pic ?? ''}}" alt="?????????????????????" style="max-width: 196px">
                        </div>
                        <input type="hidden" name="pic" value="{{$info->pic ?? ''}}" />
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">????????????</label>
                <div class="layui-input-block">
                    <div class="layui-btn" id="uploadVideo1"><i class="layui-icon">???</i>????????????</div>
                    <div class="{{$info->show_video ? '' : 'layui-hide'}}" id="uploadShowVideo" style="margin-top: 5px;">
                        <video width="320" controls id="videoLoad">
                            <source class="uploadShowVideo-source" src="{{$info->show_video ?? ''}}" type="video/mp4">
                        </video>
                    </div>
                    <input type="hidden" name="video" value="{{$info->video ?? ''}}" />
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label required">????????????</label>
                <div class="layui-input-block">
                    <div class="layui-btn layui-btn-normal" id="choiceFile">????????????</div>
                    <div class="layui-upload-list" id="showImages">
                        @if(isset($info->imgs))
                        @foreach($info->imgs as $showImg)
                            <div class="imgDiv">
                                <img src="{{$domain}}/{{$showImg}}" style="max-width: 100%; max-height: 100%;">
                                <input type="text" name="imgs[]" value="{{$showImg}}" />
                                <span class="delImag">x</span>
                            </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label required">??????</label>
                <div class="layui-input-block">
                    <input type="number" name="price" min="0.01" lay-verify="required" lay-reqtext="??????????????????" placeholder="???????????????" value="{{$info->price ?? '1'}}" class="layui-input" />
                    <div style="font-size: 10px; color: #636c72;">??????????????????0.01 ~ ????????????99999999.99 ????????????????????????</div>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label required">??????</label>
                <div class="layui-input-block">
                    <input type="number" name="original_price" min="0.01" lay-verify="required" lay-reqtext="??????????????????" placeholder="???????????????" value="{{$info->original_price ?? '1'}}" class="layui-input" />
                    <div style="font-size: 10px; color: #636c72;">??????????????????0.01 ~ ????????????99999999.99 ????????????????????????</div>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">?????????</label>
                <div class="layui-input-block">
                    <input type="number" name="cost_price" min="0.01" placeholder="??????????????????" value="{{$info->cost_price ?? '0'}}" class="layui-input" />
                    <div style="font-size: 10px; color: #636c72;">??????????????????0 ~ ????????????99999999.99 ????????????????????????</div>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">????????????</label>
                <div class="layui-input-block">
                    <input type="text" name="service" placeholder="?????????????????????" value="{{$info->service ?? ''}}" class="layui-input" />
                    <div style="font-size: 10px; color: #636c72;">?????????????????????,????????????,7??????????????????????????????????????????,??????</div>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">??????????????????</label>
                <div class="layui-input-block">
                    <input type="number" name="quota" min="0" placeholder="???????????????????????????" value="{{$info->quota ?? '0'}}" class="layui-input" />
                    <div style="font-size: 10px; color: #636c72;">????????????0???????????????????????????</div>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">????????????????????????</label>
                <div class="layui-input-block">
                    <input type="number" name="ucquota" min="0" placeholder="?????????????????????????????????" value="{{$info->ucquota ?? '0'}}" class="layui-input" />
                    <div style="font-size: 10px; color: #636c72;">????????????0???????????????????????????????????????</div>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">????????????</label>
                <div class="layui-input-block">
                    <select name="freight">
                        <option value="">????????????</option>
                    </select>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">??????????????????</label>
                <div class="layui-input-block">
                    <input type="number" name="num_full" min="0" placeholder="???????????????????????????" value="{{$info->num_full ?? '0'}}" class="layui-input" />
                    <div style="font-size: 10px; color: #636c72;">????????????0???????????????????????????</div>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">??????????????????</label>
                <div class="layui-input-block">
                    <input type="number" name="price_full" min="0" placeholder="???????????????????????????" value="{{$info->price_full ?? '0'}}" class="layui-input" />
                    <div style="font-size: 10px; color: #636c72;">????????????0???????????????????????????</div>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label required">??????</label>
                <div class="layui-input-block">
                    <input type="number" name="sort" min="0" max="100" lay-verify="required" lay-reqtext="??????????????????" placeholder="???????????????" value="{{$info->sort ?? 100}}" class="layui-input" />
                    <div style="font-size: 10px; color: #636c72;">??????????????????????????????0 ~ ????????????100???</div>
                </div>
            </div>

            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                <legend>????????????</legend>
            </fieldset>

            <div class="layui-form-item">
                <label class="layui-form-label">???????????????</label>
                <div class="layui-input-block">
                    <input type="number" name="goods_num" min="0" placeholder="????????????????????????" value="{{$goodsNum}}" class="layui-input @if(!empty($groupList)) layui-disabled @endif" style="display: inline; width: 50%; position: absolute" @if(!empty($groupList)) disabled @endif />
                    <span style="position: absolute; right: 50%; display: block; line-height: 36px; color: #464a4c; padding: 0 13px; border: 1px solid #e6e6e6; background-color: #eceeef; border-radius: 2px;">{{$info->unit ?? '???'}}</span>
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">??????????????????</label>
                <div class="layui-input-block">
                    <input type="checkbox" name="is_attr" title="???" value="1" lay-filter="is_attr_checkbox" @if(!empty($groupList)) checked @endif />
                </div>
            </div>

            <div class="attr-content" style="display: @if(empty($groupList)) none @endif">
                <div class="layui-form-item">
                    <label class="layui-form-label required">?????????????????????</label>
                    <div class="layui-input-block">
                        <div class="attr-group-div">
                            <div class="layui-inline">
                                <span class="attr-span attr-span-left">?????????</span>
                                <div class="layui-input-inline" style="margin-right: 0">
                                    <input type="text" placeholder="???????????????????????????" class="layui-input" style="border-radius:0; border-right: 0"/>
                                </div>
                                <a href="javascript:void(0)" class="layui-btn layui-btn-sm layui-btn-primary attr-group-add" style="height: 38px; line-height: 38px; border-radius: 0 2px 2px 0">??? ???</a>
                            </div>
                            <div class="attr-group">
                                @foreach($groupList as $group)
                                <div class="layui-form-item attr-group-info">
                                    <div class="group-info">
                                        <b>{{$group["name"]}}</b><a href="javascript:void(0)" class="a-del attr-group-del">x</a>
                                    </div>
                                    <div>
                                        <div class="attr-info-list">
                                            @foreach($group["attr_list"] as $attri)
                                                <div class="attr-info">
                                                    <b>{{$attri}}</b>
                                                    <a href="javascript:void(0)" class="a-del attr-del">x</a>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="layui-inline">
                                            <span class="attr-span attr-span-left" style="height: 24px; line-height: 24px;">?????????</span>
                                            <div class="layui-input-inline" style="margin-right: 0;">
                                                <input type="text" placeholder="???????????????????????????" class="layui-input" style=" height: 26px; line-height: 26px; border-radius:0; border-right: 0"/>
                                            </div>
                                            <a href="javascript:void(0)" class="layui-btn layui-btn-sm layui-btn-primary attr-add">??? ???</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label required">???????????????</label>
                    <div class="layui-input-block">
                        <table class="layui-table attr-list">
                            @if(empty($groupList))
                            <thead><tr><th>?????????????????????????????????</th></tr></thead>
                            @else
                            <thead>
                            <tr>
                                @foreach($groupList as $group)
                                <th>{{$group["name"]}}</th>
                                @endforeach
                                <th width="225px">
                                    <div>
                                        <span class="attr-span attr-span-left" style="height: 24px; line-height: 24px;">??????</span>
                                        <input type="number" min="0" placeholder="????????????" class="layui-input" style=" height: 26px; line-height: 26px; border-radius:0; border-left: 0; border-right: 0; width: 120px; float: left; "/>
                                        <a href="javascript:void(0)" class="layui-btn layui-btn-sm layui-btn-primary goods-num-edit" style="height: 26px; line-height: 26px;">??? ???</a>
                                    </div>
                                </th>
                                <th width="225px">
                                    <div>
                                        <span class="attr-span attr-span-left" style="height: 24px; line-height: 24px;">??????</span>
                                        <input type="number" min="0" placeholder="????????????" class="layui-input" style=" height: 26px; line-height: 26px; border-radius:0; border-left: 0; border-right: 0; width: 120px; float: left; "/>
                                        <a href="javascript:void(0)" class="layui-btn layui-btn-sm layui-btn-primary goods-price-edit" style="height: 26px; line-height: 26px;">??? ???</a>
                                    </div>
                                </th>
                                <th width="225px">
                                    <div>
                                        <span class="attr-span attr-span-left" style="height: 24px; line-height: 24px;">??????</span>
                                        <input type="text" placeholder="????????????" class="layui-input" style=" height: 26px; line-height: 26px; border-radius:0; border-left: 0; border-right: 0; width: 120px; float: left; "/>
                                        <a href="javascript:void(0)" class="layui-btn layui-btn-sm layui-btn-primary goods-no-edit" style="height: 26px; line-height: 26px;">??? ???</a>
                                    </div>
                                </th>
                                <th width="100px">????????????</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($info->attr as $ak => $ai)
                            <tr>
                                @foreach($ai["attr_list"] as $akk => $aii)
                                <td>
                                    <input type="hidden" name="attr[{{$ak}}][attr_list][{{$akk}}][attr_id]" value="{{$aii['attr_id']}}">
                                    <input type="hidden" name="attr[{{$ak}}][attr_list][{{$akk}}][attr_name]" value="{{$aii['attr_name']}}">
                                    <input type="hidden" name="attr[{{$ak}}][attr_list][{{$akk}}][group_id]" value="{{$aii['group_id']}}">
                                    <input type="hidden" name="attr[{{$ak}}][attr_list][{{$akk}}][group_name]" value="{{$aii['group_name']}}">
                                    asd
                                </td>
                                @endforeach
                                <td><input class="goods-info-num" type="number" name="attr[{{$ak}}][num]" value="{{$ai['num']}}"></td>
                                <td><input class="goods-info-price" type="number" name="attr[{{$ak}}][price]" value="{{$ai['price']}}"></td>
                                <td><input class="goods-info-no" type="text" name="attr[{{$ak}}][no]" value="{{$ai['no']}}"></td>
                                <td>
                                    <div class="layui-btn layui-btn-normal attrPicDiv">????????????<input type="file" class="attrPic"/></div>
                                    <div class="showAttrImage">@if($ai['pic'] != "") <img src="{{$domain}}/{{$ai['pic']}}" style="max-width: 100%; max-height: 100%;"> @endif</div>
                                    <input class="goods-info-pic" type="hidden" name="attr[{{$ak}}][pic]" value="{{$ai['pic']}}">
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>

            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                <legend>??????</legend>
            </fieldset>

            <div class="layui-form-item ">
                <label class="layui-form-label">????????????</label>
                <div class="layui-input-block">
                    <input type="number" name="integral[give]" min="0" placeholder="?????????????????????" value="{{$info->integral['give'] ?? '0'}}" class="layui-input" style="display: inline; width: 50%; position: absolute" />
                    <span style="position: absolute; right: 50%; display: block; line-height: 36px; color: #464a4c; padding: 0 13px; border: 1px solid #e6e6e6; background-color: #eceeef; border-radius: 2px;">???</span>
                    <div style="font-size: 10px; color: #636c72; padding-top: 40px;">
                        <p style="line-height: normal">???????????????????????????, ????????????????????????0??????????????????????????????????????????%??????????????????????????????????????????</p>
                        <p style="line-height: normal">???: ??????2????????????10 ??????, ?????????????????????????????? ??????????????????20??????</p>
                        <p style="line-height: normal">???: ??????2????????????10%??????, ????????????2 * 200= 400??? ?????????????????? 40 ?????????400*10%???</p>
                    </div>
                </div>
            </div>

            <div class="layui-form-item ">
                <label class="layui-form-label">????????????</label>
                <div class="layui-input-block">
                    <span style="position: absolute; display: block; line-height: 36px; color: #464a4c; padding: 0 13px; border: 1px solid #e6e6e6; background-color: #eceeef; border-radius: 2px; z-index: 999">????????????</span>
                    <input type="number" name="integral[forehead]" min="0" placeholder="?????????????????????" value="{{$info->integral['forehead'] ?? '0'}}" class="layui-input" style="display: inline; width: 50%; position: absolute; padding-left: 90px;" />
                    <span style="position: absolute; right: 50%; display: block; line-height: 36px; color: #464a4c; padding: 0 13px; border: 1px solid #e6e6e6; background-color: #eceeef; border-radius: 2px;">???</span>
                    <div style="padding-top: 40px;">
                        <input type="checkbox" name="integral[more]" title="????????????????????????" value="1" @if(isset($info->integral['more']) && $info->integral['more'] == 1) checked @endif/>
                        <div style="font-size: 10px; color: #636c72;">????????????0??????????????????????????? ?????????%???????????????????????????????????????????????????</div>
                    </div>
                </div>
            </div>

            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                <legend>????????????</legend>
            </fieldset>

            <div class="layui-form-item">
                <label class="layui-form-label required">??????????????????</label>
                <div class="layui-input-block">
                    @if(isset($info->share_open) && $info->share_open == 1)
                        <input type="radio" name="share_open" lay-filter="share_open_radio" value="0" title="?????????" />
                        <input type="radio" name="share_open" lay-filter="share_open_radio" value="1" title="??????" checked="" />
                    @else
                        <input type="radio" name="share_open" lay-filter="share_open_radio" value="0" title="?????????" checked="" />
                        <input type="radio" name="share_open" lay-filter="share_open_radio" value="1" title="??????" />
                    @endif
                </div>
            </div>

            <div class="share-content" style="display: @if(isset($info->share_open) && $info->share_open == 1) @else none @endif">
                <div class="layui-form-item ">
                    <label class="layui-form-label required">??????????????????</label>
                    <div class="layui-input-block">
                        @if(isset($info->share_type) && $info->share_type == 1)
                            <input type="radio" name="share_type" lay-filter="share_type_radio" value="0" title="?????????" />
                            <input type="radio" name="share_type" lay-filter="share_type_radio" value="1" title="????????????" checked="" />
                        @else
                            <input type="radio" name="share_type" lay-filter="share_type_radio" value="0" title="?????????" checked="" />
                            <input type="radio" name="share_type" lay-filter="share_type_radio" value="1" title="????????????" />
                        @endif
                    </div>
                </div>

                <div class="layui-form-item ">
                    <label class="layui-form-label required">??????????????????</label>
                    <div class="layui-input-block">
                        <span style="position: absolute; display: block; line-height: 36px; color: #464a4c; padding: 0 13px; border: 1px solid #e6e6e6; background-color: #eceeef; border-radius: 2px; z-index: 999">????????????</span>
                        <input type="number" name="rebate" min="0" value="{{$info->rebate ?? ''}}" class="layui-input" style="display: inline; width: 50%; position: absolute; padding-left: 90px;" />
                        <span class="share-span" style="position: absolute; right: 50%; display: block; line-height: 36px; color: #464a4c; padding: 0 13px; border: 1px solid #e6e6e6; background-color: #eceeef; border-radius: 2px;">@if(isset($info->share_type) && $info->share_type == 1) ??? @else % @endif</span>
                        <div style="font-size: 10px; color: #636c72; padding-top: 40px;">
                            <p style="line-height: normal">?????????????????????????????????????????????</p>
                            <p style="line-height: normal">?????????????????????????????????????????????????????????????????????????????????????????????</p>
                        </div>
                    </div>
                </div>

                <div class="layui-form-item ">
                    <label class="layui-form-label"></label>
                    <div class="layui-input-block">
                        <span style="position: absolute; display: block; line-height: 36px; color: #464a4c; padding: 0 13px; border: 1px solid #e6e6e6; background-color: #eceeef; border-radius: 2px; z-index: 999">????????????</span>
                        <input type="number" name="share_commission_first" min="0" value="{{$info->share_commission_first ?? ''}}" class="layui-input" style="display: inline; width: 50%; position: absolute; padding-left: 90px;" />
                        <span class="share-span" style="position: absolute; right: 50%; display: block; line-height: 36px; color: #464a4c; padding: 0 13px; border: 1px solid #e6e6e6; background-color: #eceeef; border-radius: 2px;">@if(isset($info->share_type) && $info->share_type == 1) ??? @else % @endif</span>
                    </div>
                </div>

                <div class="layui-form-item ">
                    <label class="layui-form-label"></label>
                    <div class="layui-input-block">
                        <span style="position: absolute; display: block; line-height: 36px; color: #464a4c; padding: 0 13px; border: 1px solid #e6e6e6; background-color: #eceeef; border-radius: 2px; z-index: 999">????????????</span>
                        <input type="number" name="share_commission_second" min="0" value="{{$info->share_commission_second ?? ''}}" class="layui-input" style="display: inline; width: 50%; position: absolute; padding-left: 90px;" />
                        <span class="share-span" style="position: absolute; right: 50%; display: block; line-height: 36px; color: #464a4c; padding: 0 13px; border: 1px solid #e6e6e6; background-color: #eceeef; border-radius: 2px;">@if(isset($info->share_type) && $info->share_type == 1) ??? @else % @endif</span>
                    </div>
                </div>
            </div>

            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                <legend>????????????</legend>
            </fieldset>

            <div class="layui-form-item">
                <label class="layui-form-label">????????????????????????</label>
                <div class="layui-input-block">
                    @foreach($info->getQuickPurchaseArr() as $k=>$v)
                        @if(isset($info->quick_purchase))
                            <input type="radio" name="quick_purchase" value="{{$k}}" title="{{$v}}" @if($k == $info->quick_purchase) checked="" @endif />
                        @else
                            <input type="radio" name="quick_purchase" value="{{$k}}" title="{{$v}}" @if($k == 0) checked="" @endif />
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">??????????????????</label>
                <div class="layui-input-block">
                    @foreach($info->getHotSaleArr() as $k=>$v)
                        @if(isset($info->hot_sale))
                            <input type="radio" name="hot_sale" value="{{$k}}" title="{{$v}}" @if($k == $info->hot_sale) checked="" @endif />
                        @else
                            <input type="radio" name="hot_sale" value="{{$k}}" title="{{$v}}" @if($k == 0) checked="" @endif />
                        @endif
                    @endforeach
                </div>
            </div>

            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
                <legend>????????????</legend>
            </fieldset>

            <div class="layui-form-item">
                <label class="layui-form-label required">????????????</label>
                <div class="layui-input-block">
                    @include("admin.public.ueditor", ['content' => $info->detail ?? ""])
                </div>
            </div>

            <div class="hr-line"></div>

            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn layui-btn-normal" id="saveBtn" lay-submit lay-filter="saveBtn">??????</button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('listscript')
    <script type="text/javascript">
        var groupObjArr = [];
        var attrListObjArr = [];

        layui.use(['iconPickerFa', 'form', 'layer', 'upload', 'xmSelect'], function () {
            var iconPickerFa = layui.iconPickerFa,
                form = layui.form,
                layer = layui.layer,
                upload = layui.upload,
                xmSelect = layui.xmSelect,
                $ = layui.$;

            // ?????????????????????
            $(document).on("click",".attr-group-del",function () {
                $(this).parents(".attr-group-info").remove();
                setAttrObj();
            })

            // ?????????????????????
            $(document).on("click",".attr-group-add",function () {
                let valu = $(this).prev().find("input").val();
                if(valu.length > 0) {
                    if($(".attr-group-info").length >= 3){
                        layer.msg("??????????????????3????????????",{icon: 2});
                        return false;
                    }
                    let groupDiv = '<div class="layui-form-item attr-group-info">' +
                        '<div class="group-info"><b>'+valu+'</b><a href="javascript:void(0)" class="a-del attr-group-del">x</a>' +
                        '</div>' +
                        '<div>' +
                        '<div class="attr-info-list"></div>' +
                        '<div class="layui-inline">' +
                        '<span class="attr-span attr-span-left" style="height: 24px; line-height: 24px;">?????????</span>' +
                        '<div class="layui-input-inline" style="margin-right: 0;">' +
                        '<input type="text" placeholder="???????????????????????????" class="layui-input" style=" height: 26px; line-height: 26px; border-radius:0; border-right: 0"/>' +
                        '</div>' +
                        '<a href="javascript:void(0)" class="layui-btn layui-btn-sm layui-btn-primary attr-add">??? ???</a>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                    $(".attr-group-div").append(groupDiv);
                    $(this).prev().find("input").val('');
                    setAttrObj();
                }
            })

            // ??????????????????
            $(document).on("click", ".attr-del", function(){
                $(this).parents(".attr-info").remove();
                setAttrObj();
            })

            // ??????????????????
            $(document).on("click", ".attr-add", function (){
                let valu = $(this).prev().find("input").val();
                if(valu.length > 0){
                    let attrDiv = '<div class="attr-info"><b>'+valu+'</b><a href="javascript:void(0)" class="a-del attr-del">x</a></div>';
                    $(this).parents(".layui-inline").prev().append(attrDiv);
                    $(this).prev().find("input").val('');
                    setAttrObj();
                }
            })

            // ????????????????????????????????????
            function setAttrObj(){
                groupObjArr = [];
                $(".attr-group-info").each(function (i){
                    let iThis = this;
                    let iinfo = {};
                    iinfo.group_name = $(iThis).find(".group-info").find("b").html();
                    iinfo.group_id = "";
                    iinfo.attr_list = [];

                    $(iThis).find(".attr-info-list").find(".attr-info").each(function (k) {
                        let kThis = this;
                        let kinfo = {};
                        kinfo.attr_name = $(kThis).find("b").html();
                        kinfo.attr_id = "";
                        iinfo.attr_list.push(kinfo);
                    })
                    groupObjArr.push(iinfo);
                })

                attrListObjArr = [];
                for (var i in groupObjArr) {
                    for (var j in groupObjArr[i].attr_list) {
                        var object = {
                            group_name: groupObjArr[i].group_name,
                            group_id: groupObjArr[i].group_id,
                            attr_name: groupObjArr[i].attr_list[j].attr_name,
                            attr_id: groupObjArr[i].attr_list[j].attr_id,
                        };
                        if (!attrListObjArr[i])
                            attrListObjArr[i] = [];
                        attrListObjArr[i].push(object);
                    }
                }

                var len = attrListObjArr.length;
                var results = [];
                var indexs = {};
                function specialSort(start) {
                    start++;
                    if (start > len - 1) {
                        return;
                    }
                    if (!indexs[start]) {
                        indexs[start] = 0;
                    }
                    if (!(attrListObjArr[start] instanceof Array)) {
                        attrListObjArr[start] = [attrListObjArr[start]];
                    }
                    for (indexs[start] = 0; indexs[start] < attrListObjArr[start].length; indexs[start]++) {
                        specialSort(start);
                        if (start == len - 1) {
                            var temp = [];
                            for (var i = len - 1; i >= 0; i--) {
                                if (!(attrListObjArr[start - i] instanceof Array)) {
                                    attrListObjArr[start - i] = [attrListObjArr[start - i]];
                                }
                                if (attrListObjArr[start - i][indexs[start - i]]) {
                                    temp.push(attrListObjArr[start - i][indexs[start - i]]);
                                }
                            }
                            var key = [];
                            for (var i in temp) {
                                key.push(temp[i].attr_id);
                            }
                            results.push({
                                num: 0,
                                price: 0,
                                no: '',
                                pic: '',
                                attr_list: temp
                            });
                        }
                    }
                }
                specialSort(-1);
                // ??????????????????   thead
                var table = $(".attr-list");
                if(results.length > 0){
                    let theadTh = '<thead><tr>';
                    for (let ri in results[0].attr_list){
                        theadTh += '<th>'+results[0].attr_list[ri].group_name+'</th>';
                    }
                    theadTh += '<th width="225px">';
                    theadTh += '<div>'
                    theadTh += '<span class="attr-span attr-span-left" style="height: 24px; line-height: 24px;">??????</span>'
                    theadTh += '<input type="number" min="0" placeholder="????????????" class="layui-input" style=" height: 26px; line-height: 26px; border-radius:0; border-left: 0; border-right: 0; width: 120px; float: left; "/>'
                    theadTh += '<a href="javascript:void(0)" class="layui-btn layui-btn-sm layui-btn-primary goods-num-edit" style="height: 26px; line-height: 26px;">??? ???</a>'
                    theadTh += '</div>'
                    theadTh += '</th>'
                    theadTh += '<th width="225px">'
                    theadTh += '<div>'
                    theadTh += '<span class="attr-span attr-span-left" style="height: 24px; line-height: 24px;">??????</span>'
                    theadTh += '<input type="number" min="0" placeholder="????????????" class="layui-input" style=" height: 26px; line-height: 26px; border-radius:0; border-left: 0; border-right: 0; width: 120px; float: left; "/>'
                    theadTh += '<a href="javascript:void(0)" class="layui-btn layui-btn-sm layui-btn-primary goods-price-edit" style="height: 26px; line-height: 26px;">??? ???</a>'
                    theadTh += '</div>'
                    theadTh += '</th>'
                    theadTh += '<th width="225px">'
                    theadTh += '<div>'
                    theadTh += '<span class="attr-span attr-span-left" style="height: 24px; line-height: 24px;">??????</span>'
                    theadTh += '<input type="text" placeholder="????????????" class="layui-input" style=" height: 26px; line-height: 26px; border-radius:0; border-left: 0; border-right: 0; width: 120px; float: left; "/>'
                    theadTh += '<a href="javascript:void(0)" class="layui-btn layui-btn-sm layui-btn-primary goods-no-edit" style="height: 26px; line-height: 26px;">??? ???</a>'
                    theadTh += '</div>'
                    theadTh += '</th>'
                    theadTh += '<th width="100px">????????????</th>'
                    theadTh += '</tr></thead>';

                    let tbodyTh = '<tbody>';
                    for (let ri in results){
                        tbodyTh += "<tr>";
                        for(let rri in results[ri].attr_list){
                            tbodyTh += '<td>';
                            tbodyTh += '<input type="hidden" name="attr['+ri+'][attr_list]['+rri+'][attr_id]" value="'+results[ri].attr_list[rri].attr_id+'">';
                            tbodyTh += '<input type="hidden" name="attr['+ri+'][attr_list]['+rri+'][attr_name]" value="'+results[ri].attr_list[rri].attr_name+'">';
                            tbodyTh += '<input type="hidden" name="attr['+ri+'][attr_list]['+rri+'][group_id]" value="'+results[ri].attr_list[rri].group_id+'">';
                            tbodyTh += '<input type="hidden" name="attr['+ri+'][attr_list]['+rri+'][group_name]" value="'+results[ri].attr_list[rri].group_name+'">';
                            tbodyTh += results[ri].attr_list[rri].attr_name;
                            tbodyTh += '</td>';
                        }
                        tbodyTh += '<td><input class="goods-info-num" type="number" name="attr['+ri+'][num]" value="'+results[ri].num+'"></td>';
                        tbodyTh += '<td><input class="goods-info-price" type="number" name="attr['+ri+'][price]" value="'+results[ri].price+'"></td>';
                        tbodyTh += '<td><input class="goods-info-no" type="text" name="attr['+ri+'][no]" value="'+results[ri].pic+'"></td>';
                        tbodyTh += '<td><div class="layui-btn layui-btn-normal attrPicDiv">????????????<input type="file" class="attrPic"/></div><div class="showAttrImage"></div><input class="goods-info-pic" type="text" name="attr['+ri+'][pic]" value="'+results[ri].pic+'"></td>';
                        tbodyTh += "</tr>";
                    }
                    tbodyTh += '</tbody>';
                    table.html(theadTh + tbodyTh);
                }else{
                    table.html('<thead><tr><th>?????????????????????????????????</th></tr></thead>');
                }
            }

            // ????????????????????????
            $(document).on("click", ".goods-num-edit", function (){
                let valn = $(this).prev().val();
                if(valn.length > 0) {
                    $(".goods-info-num").val(valn);
                }
            })

            // ????????????????????????
            $(document).on("click", ".goods-price-edit", function (){
                let valn = $(this).prev().val();
                if(valn.length > 0 && valn >= 0) {
                    $(".goods-info-price").val(valn);
                }
            })

            // ????????????????????????
            $(document).on("click", ".goods-no-edit", function (){
                let valn = $(this).prev().val();
                if(valn.length > 0) {
                    $(".goods-info-no").val(valn);
                }
            })

            // ????????????????????????
            $(document).on("change", ".attrPic", function(){
                let _this = $(this);
                let fileData = new FormData();
                fileData.append("file", _this[0].files[0]);  // ??????document.getElementById("file")[0]
                fileData.append("name", _this.val());

                // ??????????????????
                if(!/image\/\w+/.test(_this[0].files[0].type)){
                    layer.msg("???????????????",{icon: 2});
                    return false;
                }
                // ??????????????????
                if(_this[0].files[0].size > 400*1024){
                    layer.msg("??????????????????400KB",{icon: 2});
                    return false;
                }
                $.ajax({
                    url:'/admin/upload/upload',
                    type:'post',
                    data:fileData,
                    contentType:false,
                    processData:false,
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success:function(res){
                        console.log(res);
                        if(res.code==0){
                            var domain = window.location.host;
                            _this.parents(".attrPicDiv").nextAll(".showAttrImage").html('<img src="http://' + domain + "/" + res.data[0] + '" style="max-width: 100%; max-height: 100%;">');
                            _this.parents(".attrPicDiv").nextAll(".goods-info-pic").val(res.data[0]);
                        }else{
                            layer.msg(res.message,{icon: 2});
                            _this.parents(".attrPicDiv").nextAll(".showAttrImage").html('');
                            _this.parents(".attrPicDiv").nextAll(".goods-info-pic").val('');
                        }
                    },
                    error:function (data) {
                        layer.msg(res.message,{icon: 2});
                        _this.val("");
                    }
                });
            })

            // ??????????????????
            $("input[name='unit']").change(function(){
                $("input[name='goods_num']").next().html($(this).val());
            });

            // ????????????????????????????????????
            form.on('radio(share_open_radio)', function (data) {
                let val = data.value;
                if(val == 1){
                    $(".share-content").css("display", "block");
                }else{
                    $(".share-content").css("display", "none");
                }
            })

            // ?????????????????????????????????
            form.on('radio(share_type_radio)', function (data) {
                let val = data.value;
                if(val == 1){
                    $(".share-span").html("???");
                }else{
                    $(".share-span").html("%");
                }
            })

            // ??????????????????????????????
            form.on('checkbox(is_attr_checkbox)', function (data){
                let checked = data.elem.checked;
                if(checked === true){
                    $("input[name='goods_num']").addClass("layui-disabled").attr("disabled", "disabled");
                    $("input[name='goods_num']").val(0);
                    $(".attr-content").css("display", "block");
                }else{
                    $("input[name='goods_num']").removeClass("layui-disabled").attr("disabled", false);
                    $(".attr-content").css("display", "none");
                }
            });

            // ????????????
            upload.render({
                elem: '#uploadVideo1'
                ,url: '/admin/upload/video' //??????????????????????????????
                ,accept: 'video' //??????
                ,acceptMime: 'video/mp4'
                ,headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                ,done: function(res){
                    if(res.code==0){
                        layer.msg("????????????",{icon: 1});
                        var domain = window.location.host;
                        layui.$('#uploadShowVideo').removeClass('layui-hide');
                        layui.$('.uploadShowVideo-source').attr('src', "http://" + domain + "/" + res.data[0]);
                        layui.$('#videoLoad').load();
                        $("input[name='video']").val(res.data[0]);
                    }else{
                        layer.msg(res.message,{icon: 2});
                        layui.$('#uploadShowVideo').addClass('layui-hide');
                        layui.$('.uploadShowVideo-source').attr('src', "");
                        layui.$('#videoLoad').load();
                        $("input[name='video']").val('');
                    }
                }
            });

            //????????????
            upload.render({
                elem: '#upload1'
                ,url: '/admin/upload/upload' //??????????????????????????????
                ,accept: 'images'
                ,acceptMime: 'image/*'
                ,size: 400 //??????????????????????????? KB
                ,headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                ,done: function(res){
                    if(res.code==0){
                        layer.msg("????????????",{icon: 1});
                        var domain = window.location.host;
                        layui.$('#uploadShowImg').removeClass('layui-hide').find('img').attr('src', "http://" + domain + "/" + res.data[0]);
                        $("input[name='pic']").val(res.data[0]);
                    }else{
                        layer.msg(res.message,{icon: 2});
                        layui.$('#uploadShowImg').addClass('layui-hide');
                        $("input[name='pic']").val('');
                    }
                }
            });

            // ?????????????????????
            var fileImages = "";
            $(document).on("click",".delImag",function () {
                $(this).parent("div").remove();
                if($(".imgDiv").length >= 9){
                    layui.$('#choiceFile').addClass('layui-hide');
                }else{
                    layui.$('#choiceFile').removeClass('layui-hide');
                }
            })

            //???????????????
            upload.render({
                elem: '#choiceFile'
                ,url: '/admin/upload/upload' //??????????????????????????????
                ,accept: 'images'
                ,acceptMime: 'image/*'
                ,size: 400 //??????????????????????????? KB
                ,headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
                ,choose: function(){
                    if($(".imgDiv").length >= 8){
                        layui.$('#choiceFile').addClass('layui-hide');
                    }else{
                        layui.$('#choiceFile').removeClass('layui-hide');
                    }
                }
                ,done: function(res){
                    if(res.code==0){
                        var domain = window.location.host;
                        $('#showImages').append('<div class="imgDiv">' +
                            '<img src="http://' + domain + "/" + res.data[0] + '" style="max-width: 100%; max-height: 100%;">' +
                            '<input type="text" name="imgs[]" value="'+ res.data[0] +'" />' +
                            '<span class="delImag">x</span>' +
                            '</div>');
                    }else{
                        layer.msg(res.message,{icon: 2});
                    }
                }
            });

            // ??????????????????
            function setXmSelect(id, name, data){
                xmSelect.render({
                    el: '#' + id,
                    layVerify: 'required',
                    name:name,
                    toolbar: {
                        show: true,
                    },
                    filterable: true,
                    theme: {
                        color: '#a5673f',
                    },
                    tree: {
                        //????????????????????????
                        show: true,
                        //????????????????????????
                        showFolderIcon: true,
                        //??????????????????
                        showLine: false,
                        //??????
                        indent: 20,
                        //???????????????????????????, ??? true ???, ??????????????????
                        expandedKeys: [],
                        //??????????????????????????????
                        strict: false,
                        //????????????????????????
                        simple: false,
                        //????????????????????????
                        clickExpand: true,
                        //????????????????????????
                        clickCheck: true,
                    },
                    data: data
                })
            }

            var infoId = $('input[name="id"]').val();
            $.ajax({
                url:'/admin/goods/xmSelect',
                type:'post',
                data:{'id':infoId},
                dataType:'JSON',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success:function(res){
                    if(res.code==0){
                        setXmSelect("goodsCat", "cat_ids", res.data.goodsCat);
                    }else{
                        layer.msg(res.message,{icon: 2});
                    }
                },
                error:function (data) {
                    layer.msg(res.message,{icon: 2});
                }
            });

            //????????????
            form.on('submit(saveBtn)', function(data){
                $("#saveBtn").addClass("layui-btn-disabled");
                $("#saveBtn").attr('disabled', 'disabled');
                $.ajax({
                    url:'/admin/goods/edit',
                    type:'post',
                    data:data.field,
                    dataType:'JSON',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success:function(res){
                        if(res.code==0){
                            // var index = parent.layer.getFrameIndex(window.name);
                            // layer.msg(res.message,{icon: 1},function (){
                            //     parent.layer.close(index)
                            // });
                            layer.msg(res.message,{icon: 1},function (){
                                // parent.layer.close(index)
                                parent.location.reload();
                            });
                        }else{
                            layer.msg(res.message,{icon: 2});
                            $("#saveBtn").removeClass("layui-btn-disabled");
                            $("#saveBtn").removeAttr('disabled');
                        }
                    },
                    error:function (data) {
                        layer.msg(res.message,{icon: 2});
                        $("#saveBtn").removeClass("layui-btn-disabled");
                        $("#saveBtn").removeAttr('disabled');
                    }
                });
            });
        });
    </script>
@endsection