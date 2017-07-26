<?php $this->load->view('layout/header');?>

                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
                    
					<div class="fixed-fluid">
				        <div class="panel">
				            <!-- Simple profile -->
				            <div class="text-center pad-all bord-btm">
				                <h4 class="text-lg text-overflow mar-no"><?php echo $res->platform_code?></h4>
				            </div>
				            <p class="text-semibold text-main pad-all mar-no">图片</p>
				            <div class="pad-hor mar-btm">
				               <?php if(!empty($res->cover_img)):?>
				               <img width=150 src="<?php echo $this->config->image_url.$res->cover_img?>">
				               <?php endif;?>
				            </div>
				            <p class="text-semibold text-main pad-all mar-no">详情</p>
				            <div class="pad-hor mar-btm">
				               <p class="text-sm text-muted">型号：<a class="btn-link" href="<?php echo base_url('Cgoods/page/'.$res->goods_id)?>"><?php echo $res->supplier_code?></a></p>
				               <p class="text-sm text-muted">供应商：<a class="btn-link" href="<?php echo base_url('Csupplier_buyer/page/'.$res->supplier_id)?>"><?php echo $res->supplier_name?></a></p>
				               <p>原价：<?php echo $res->price?>元/米</p>
				               <p>订单价：<?php echo $res->order_price?>元/米</p>
				               <p>数量：<?php echo $res->number?>米</p>
				               <p>总价：<strong style="color:red;"><?php echo $res->sum_goods_price?></strong>元</p>
				               <p>属性：<?php $attr = json_decode($res->goods_attr)?>
				                   </br>成分：<?php echo $attr->component;?>
				                   </br>门幅：<?php echo $attr->width;?>
				                   </br>平方克重：<?php echo $attr->square_weight;?>
				                   </br>缩水率：<?php echo $attr->shrinkage;?>
				                   </br>磨毛：<?php echo $attr->sanding;?>
				                   </br>格型：<?php echo $attr->lattice;?>
				                   </br>颜色：<?php echo $attr->color;?>
				                   </br>潘通色号：<?php echo $attr->pantone_color;?>
				                   </br>格子：<?php echo $attr->tex_grid;?>
				                   </br>纱支密度：<?php echo $attr->yarn_density;?>
				                   </br>花回尺寸：<?php echo $attr->back_size;?>
				                   </br>厚薄：<?php echo $attr->thickness;?>
				                   </br>工艺组成：<?php echo $attr->tech_composed;?>
				               </p>
				               <p>下单时间：<?php echo date('Y-m-d H:i:s', $res->time)?></p>
				            </div>
				        </div>
					    
					</div>
                </div>
                <!--===================================================-->
                <!--End page content-->

<?php $this->load->view('layout/footer');?>            