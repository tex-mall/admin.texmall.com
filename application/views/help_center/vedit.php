<?php $this->load->view('layout/header');?>

                <!--Page content-->
                <!--===================================================-->
                <script charset="utf-8" src="<?php echo inc_file('kindeditor-min.js', 'kindeditor')?>"></script>
                <script charset="utf-8" src="<?php echo inc_file('lang/zh_CN.js', 'kindeditor')?>"></script>
                <script charset="utf-8" src="<?php echo inc_file('ready.js', 'kindeditor')?>"></script>
                <div id="page-content">
                    <div class="row">
					    <div class="col-lg-12">
					        <div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title"><?php echo $two_level.'- 编辑'?></h3>
					            </div>
					            <form class="form-horizontal" action="<?php echo base_url('Chelp_center/editPost');?>" method="post" enctype="multipart/form-data">
					                <div class="panel-body">
    					                <input type="hidden" name="id" value="<?php echo $res->id?>">
    					                <div class="form-group pad-ver">
    					                    <label class="col-md-3 control-label">类型*</label>
    					                    <div class="col-md-6">
					                            <select class="selectpicker" name="category_id" required="required">
                	                                <option value="">请选择类型</option>
                                                    <?php foreach($cat_arr as $k=>$v) :?>
                                                    <option <?php if($res->category_id==$k) echo 'selected="selected"'?> value="<?php echo $k?>"><?php echo $v?></option>
                                                    <?php endforeach;?>
                                                </select>
    					                    </div>
    					                </div>
    					                
    					                <div class="form-group">
    					                    <label class="col-md-3 control-label" for="demo-text-input">标题*</label>
    					                    <div class="col-md-6">
    					                        <input type="text" class="form-control" name="title" required="required" maxlength="20" value="<?php echo $res->title?>" placeholder="...">
    					                    </div>
    					                </div>
    					                
    					                <div class="form-group">
    					                    <label class="col-md-3 control-label" for="demo-text-input">作者*</label>
    					                    <div class="col-md-6">
    					                        <input type="text" class="form-control" name="author" required="required" maxlength="20" value="<?php echo $res->author?>" placeholder="...">
    					                    </div>
    					                </div>
    					
    					                <div class="form-group">
    					                    <label class="col-md-3 control-label" for="demo-textarea-input">内容*</label>
    					                    <div class="col-md-6">
    					                        <textarea rows="5" class="form-control edit" placeholder="..." name="des"><?php echo $res->des?></textarea>
    					                    </div>
    					                </div>
    					                
    					                <div class="form-group">
    					                    <label class="col-md-3 control-label" for="demo-text-input">排序*</label>
    					                    <div class="col-md-6">
    					                        <input type="number" class="form-control" name="reorder" required="required" maxlength="2" value="<?php echo $res->reorder?>" placeholder="...">
    					                    </div>
    					                </div>
    					                
    					                <div class="form-group pad-ver">
    					                    <label class="col-md-3 control-label">上架状态*</label>
    					                    <div class="col-md-6">
					                            <select class="selectpicker" name="status" required="required">
                	                                <option <?php if($res->status==1)echo 'selected="selected"'?> value="1">上架</option>
                	                                <option <?php if($res->status==2)echo 'selected="selected"'?> value="2">下架</option>
                                                </select>
    					                    </div>
    					                </div>
    					
					                </div>
					                
					                <div class="panel-footer">
					                    <div class="row">
					                        <div class="col-sm-9 col-sm-offset-3">
					                            <button class="btn btn-mint" type="submit">提交</button>
					                        </div>
					                    </div>
					                </div>
					            </form>
					        </div>
					    </div>
					</div>
                </div>
                <!--===================================================-->
                <!--End page content-->

<?php $this->load->view('layout/footer');?>            