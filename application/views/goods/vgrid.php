<?php $this->load->view('layout/header');?>

                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    <div class="panel">
					    <div class="panel-heading">
					        <h3 class="panel-title" id="demo-bootbox-custom-h-content">
    					        <?php echo $two_level?>
					            <a style="margin-left:50px;" href="<?php echo base_url('Cgoods/add');?>"><button class="btn btn-success"><i class="ion-plus-round"></i>添加</button></a>
					            <a href="javascript:;" onClick="window.location.reload();"><button class="btn btn-default"><i class="ion-load-d"></i>刷新</button></a>
					        </h3>
					    </div>
					    <div class="panel-body">
					        <form class="form-inline" action="<?php echo base_url('Cgoods/grid');?>" method="get">
					            <div class="form-group">
    					            <select class="selectpicker" name="is_sale">
    	                                <option value="">请选择上架状态</option>
                                        <option <?php if($this->input->get('is_sale')==1)echo 'selected="selected"'?> value="1">上架</option>
                                        <option <?php if($this->input->get('is_sale')==2)echo 'selected="selected"'?> value="2">待售</option>
                                        <option <?php if($this->input->get('is_sale')==3)echo 'selected="selected"'?> value="3">下架</option>
                                    </select>
					            </div>
					            
					            <div class="form-group">
    					            <select class="selectpicker" name="is_check">
    	                                <option value="">请选择审核状态</option>
                                        <option <?php if($this->input->get('is_check')==1)echo 'selected="selected"'?> value="1">正在审核</option>
                                        <option <?php if($this->input->get('is_check')==2)echo 'selected="selected"'?> value="2">审核通过</option>
                                        <option <?php if($this->input->get('is_check')==3)echo 'selected="selected"'?> value="3">审核不通过</option>
                                    </select>
					            </div>
					            
					            <div class="form-group">
    					            <select class="selectpicker" name="platform_grade">
    	                                <option value="">请选择平台等级</option>
                                        <option <?php if($this->input->get('platform_grade')==1)echo 'selected="selected"'?> value="1">正常</option>
                                        <option <?php if($this->input->get('platform_grade')==2)echo 'selected="selected"'?> value="2">推荐</option>
                                        <option <?php if($this->input->get('platform_grade')==3)echo 'selected="selected"'?> value="3">严选</option>
                                    </select>
					            </div>
					            
					            <div class="form-group">
    					            <select class="selectpicker" name="component">
    	                                <option value="">请选择成分</option>
                                        <option <?php if($this->input->get('component')==1)echo 'selected="selected"'?> value="1">正常</option>
                                        <option <?php if($this->input->get('component')==2)echo 'selected="selected"'?> value="2">推荐</option>
                                        <option <?php if($this->input->get('component')==3)echo 'selected="selected"'?> value="3">严选</option>
                                    </select>
					            </div>
					            
					            <div class="form-group" style="margin-bottom: 15px;">
					                <input type="text" class="form-control" style="margin-top: 15px;" name="platform_name" value="<?php echo $this->input->get('platform_name');?>" placeholder="平台名称">
					            </div>
					            
					            <div class="form-group">
					                <input type="text" class="form-control date-select" name="sta_time" value="<?php echo $this->input->get('sta_time');?>" placeholder="开始时间">
					            </div>
					            
					            <div class="form-group">
					                <input type="text" class="form-control date-select" name="end_time" value="<?php echo $this->input->get('end_time');?>" placeholder="截至时间">
					            </div>
					            
					            <div class="form-group">
					                <input type="text" class="form-control" name="item" value="<?php echo $this->input->get('item');?>" placeholder="编码/供应商/工艺组成/风格/类目">
					            </div>
					            
					            <button class="btn btn-primary" type="submit">搜索</button>
					        </form>
					
					    </div>
					</div>
                    <div class="row">
				        <div class="panel">
				            <div class="panel-body">
				                <div class="bootstrap-table">
					                <div class="fixed-table-container" >
    					                <table class="demo-add-niftycheck table table-hover">
    					                    <thead>
        					                    <tr>
            					                    <th width="2%"><div class="th-inner"><input class="select-all" type="checkbox"></div></th>
            					                    <th width="5%"><div class="th-inner">ID</div></th>
                                                    <th width="10%"><div class="th-inner">图片</div></th>
                                                    <th width="10%"><div class="th-inner">供应商</div></th>
                                                    <th width="20%"><div class="th-inner">属性</div></th>
                                                    <th width="5%"><div class="th-inner">上架状态</div></th>
                                                    <th width="5%"><div class="th-inner">审核状态</div></th>
                                                    <th width="10%"><div class="th-inner">平台等级</div></th>
                                                    <th width="10%"><div class="th-inner">指标</div></th>
                                                    <th width="10%"><div class="th-inner">时间</div></th>
                                                    <th width="5%"><div class="th-inner">操作</div></th>
        					                    </tr>
    					                    </thead>
        					                <tbody>
        					                    <?php foreach($res as $r):?>
        					                    <tr data-checkid="<?php echo $r->id?>" data-scode="<?php echo $r->supplier_code?>">
            					                    <td><div class="th-inner"><input class="list-check" type="checkbox" name="checkid[]" value="<?php echo $r->id?>"></div></td>
            					                    <td><?php echo $r->id?></td>
                                                    <td>
                                                        <?php echo $r->platform_name.'</br>';?>
                                                        <img style="height:80px;width:80px;" src="<?php echo $this->config->image_url.$r->cover_img?>">
                                                    </td>
                                                    <td>
                                                        <?php 
                                                        echo '编 码：'.$r->supplier_code.'</br>';
                                                        echo '<a style="text-decoration:underline;" href="'.base_url('Csupplier_buyer/edit/'.$r->supplier_id).'">供应商：'.$r->supplier_name.'</a></br>';
                                                        echo '<a style="text-decoration:underline;" href="'.base_url('Cuser/edit/'.$r->uid).'">上传用户：'.$r->uid.'</a></br>';
                                                        echo '价格：'.$r->price.'元/米</br>';
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                        echo '成分：'.$r->component.'</br>';
                                                        echo '缩水率：'.$r->shrinkage.'</br>';
                                                        echo '门幅：'.$r->width.'</br>';
                                                        echo '平方克重：'.$r->square_weight.'</br>';
                                                        echo '工艺组成：'.$r->tech_composed.'</br>';
                                                        ?>
                                                    </td>
                                                    <td><?php echo $r->is_sale==1 ? '<i class="ion-checkmark"></i>' : '<i class="ion-close"></i>'?></td>
                                                    <td><?php echo $check_arr[$r->is_check]?></td>
                                                    <td><?php echo '<button class="grade btn btn-purple">'.$grade_arr[$r->platform_grade].'</button>'?></td>
                                                    <td>
                                                        <?php 
                                                        echo '销量：'.$r->sum_sale.'米</br>';
                                                        echo '评价：'.$r->sum_review.'</br>';
                                                        echo '浏览：'.$r->pv;
                                                        ?>
                                                    </td>
                                                    <td><?php echo date('Y-m-d H:i:s', $r->time);?></td>
            					                    <td>
                                                        <div class="btn-group m-b-5">
                                                            <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown">
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu animated fadeIn">
                                                                <li><a href="<?php echo base_url('Cgoods/edit/'.$r->id);?>"><i class="ion-eye"></i>查看</a></li>
                                                                <li><a href="<?php echo base_url('Corder_reviews/edit?goods_id='.$r->id);?>"><i class="ion-eye"></i>查看评价</a></li>
                                                                <li><a href="javascript:layer_conf('<?php echo base_url('Cgoods/delete/'.$r->id);?>');"><i class="ion-trash-a"></i>删除</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
        					                    </tr>
        					                    <?php endforeach;?>
        					                </tbody>
    					                </table>
    					                <script>
    					                //时间
    					                $('input.date-select').datepicker({
					                		format: "yyyy-mm-dd",
					                        todayBtn: "linked",
					                        autoclose: true,
					                        todayHighlight: true
    					                });
    					                
          					            // 全选、全不选、反选
          					            $('.demo-add-niftycheck').on('click','.select-all',function(){     
    										$('input[name="checkid[]"]').each(function(){
    											if(this.checked){
    												this.checked = false;
    											}else{
    												this.checked = true;
    											}
    										});
    									});

          					            //审核
        					            $('.table tr').on('click', '.label-info', function(){
            					            var scode = $(this).parents('tr').data('scode');
        					            	var checkid = $(this).parents('tr').data('checkid');
            					          	var	html =  '<div class="panel-body demo-nifty-btn">';
            					          		html += '<a href="'+base_url+'Cgoods/check_out/'+checkid+'?is_check=2"><button class="btn btn-info">通过</button></a>';
            					          		html += '<a href="'+base_url+'Cgoods/check_out/'+checkid+'?is_check=3"><button class="btn btn-danger" style="margin-left: 15px;">不通过</button></a>';
                    					        html += '</div>',
        					            	layer.open({
        					            	  type: 1,
        					            	  title: '审核 （id：' + checkid + '；编码：' + scode + '）',
        					            	  skin: 'layui-layer-rim', //加上边框
        					            	  area: ['420px', '240px'], //宽高
        					            	  content: html
        					            	});
            					        });

            					        //平台等级
        					            $('.table tr').on('click', '.grade', function(){
            					            var scode = $(this).parents('tr').data('scode');
        					            	var checkid = $(this).parents('tr').data('checkid');
            					          	var	html =  '<div class="panel-body demo-nifty-btn">';
            					          		html += '<a href="'+base_url+'Cgoods/up_grade/'+checkid+'?grade=1"><button class="btn btn-info">正常</button></a>';
            					          		html += '<a href="'+base_url+'Cgoods/up_grade/'+checkid+'?grade=2"><button class="btn btn-info" style="margin-left: 15px;">推荐</button></a>';
            					          		html += '<a href="'+base_url+'Cgoods/up_grade/'+checkid+'?grade=3"><button class="btn btn-info" style="margin-left: 15px;">严选</button></a>';
                    					        html += '</div>',
        					            	layer.open({
        					            	  type: 1,
        					            	  title: '平台等级 （id：' + checkid + '；编码：' + scode + '）',
        					            	  skin: 'layui-layer-rim', //加上边框
        					            	  area: ['420px', '240px'], //宽高
        					            	  content: html
        					            	});
            					        });

    					                </script>
    					            </div>
    					        </div>
					        </div>
				        </div>
					</div>
                </div>
                <!--===================================================-->
                <!--End page content-->

<?php $this->load->view('layout/footer');?>            