<?php $this->load->view('layout/header');?>

                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    <div class="panel">
					    <div class="panel-heading">
					        <h3 class="panel-title">
    					        <?php echo $two_level?>
					            <a style="margin-left:50px;" href="javascript:;" onClick="window.location.reload();"><button class="btn btn-default"><i class="ion-load-d"></i>刷新</button></a>
					        </h3>
					    </div>
					    <div class="panel-body">
					        <form class="form-inline" action="<?php echo base_url('Cadmin_log/grid');?>" method="get">
					            
					            <div class="form-group">
					                <input type="text" class="form-control date-select" name="sta_time" value="<?php echo $this->input->get('sta_time');?>" placeholder="开始时间">
					            </div>
					            
					            <div class="form-group">
					                <input type="text" class="form-control date-select" name="end_time" value="<?php echo $this->input->get('end_time');?>" placeholder="截至时间">
					            </div>
					            
					            <div class="form-group">
					                <input type="text" class="form-control" name="item" value="<?php echo $this->input->get('item');?>" placeholder="日志用户名/电话/IP/方法">
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
                                                    <th width="10%"><div class="th-inner">管理员ID</div></th>
                                                    <th width="10%"><div class="th-inner">日志</div></th>
                                                    <th width="20%"><div class="th-inner">时间</div></th>
                                                    <th width="5%"><div class="th-inner">操作</div></th>
        					                    </tr>
    					                    </thead>
        					                <tbody>
        					                    <?php foreach($res as $r):?>
        					                    <tr>
            					                    <td><div class="th-inner"><input class="list-check" type="checkbox" name="checkid[]" value="<?php echo $r->id?>"></div></td>
            					                    <td><?php echo $r->id?></td>
                                                    <td><?php echo $r->admin_uid?></td>
                                                    <td>
                                                        <?php 
                                                        $log = json_decode($r->log);
                                                        echo '用户名：'.$log->username;
                                                        echo '</br>电话：'.$log->mobile;
                                                        echo '</br>IP：'.$log->ip;
                                                        echo '</br>方法：'.$log->func;
                                                        ?>
                                                    </td>
                                                    <td><?php echo date('Y-m-d H:i:s', $r->time)?></td>
            					                    <td>
                                                        <div class="btn-group m-b-5">
                                                            <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown">
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu animated fadeIn">
                                                                <li><a href="javascript:layer_conf('<?php echo base_url('Cadmin_log/delete/'.$r->id);?>');"><i class="ion-trash-a"></i>删除</a></li>
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
					                        todayHighlight: true,
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
    					                </script>
    					            </div>
    					        </div>
    					        <div class="pull-right pagination">
    					        <ul class="pagination">
    					            <li><a>每页<?php echo $per_page?>条/共<?php echo $sum?>条</a></li>
    					            <li><a>第<?php echo empty($this->uri->segment(3)) ? 1 : $this->uri->segment(3)?>页</a></li>
    					        </ul>
    					        <?php echo $link;?> 
    					        </div>
					        </div>
				        </div>
					</div>
                </div>
                <!--===================================================-->
                <!--End page content-->

<?php $this->load->view('layout/footer');?>            