<?php
/* Smarty version 3.1.33, created on 2019-09-17 11:21:51
  from 'D:\phpStudy\PHPTutorial\WWW\tp\application\home\view\public\header.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d80514f728ef2_29758195',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '89a4dfde38b7271804047d89e284be16b80f26a3' => 
    array (
      0 => 'D:\\phpStudy\\PHPTutorial\\WWW\\tp\\application\\home\\view\\public\\header.html',
      1 => 1568686003,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d80514f728ef2_29758195 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 src="<?php echo resource();?>
home/layer/layer.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 >
    var checkAccount="<?php echo url('Login/checkAccount');?>
";
    var sendMsg="<?php echo url('Login/sendMsg');?>
";
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo resource();?>
home/js/common.js"><?php echo '</script'; ?>
>


<div id='top-fixed'>
    <div id='top-bar'>
        <ul class="top-bar-left fl">
            <li><a href="http://www.houdunwang.com" target='_blank'>后盾顶尖后盾PHP培训</a></li>
            <li><a href="http://www.houdunwang.com" target='_blank'>后盾论坛</a></li>
        </ul>
        <ul class='top-bar-right fr'>
            <?php if (isset($_SESSION['user'])) {?>
            		 <li class='userinfo'>
                      <a href="<?php echo url('User/userinfo');?>
" class='uname'><?php echo $_SESSION['user']['user_name'];?>
</a>
                     </li>
                     <li style='color:#eaeaf1'>|</li>
                     <li><a href="<?php echo url('Login/logout');?>
">退出</a></li>

<?php } else { ?>

            <li><a href="" class='login'>登录</a></li>
            <li style='color:#eaeaf1'>|</li>
            <li><a href="" class='register'>注册</a></li>
            <?php }?>
        </ul>
    </div>
    <!-- 提问搜索框 -->
    <div id='search'>
        <div class='logo'><a href="" class='logo'></a></div>
        <form action="" method=''>
            <input type="text" name='' class='sech-cons'/>
            <input type="submit" class='sech-btn'/>
        </form>
        <a href="" class='ask-btn'></a>
    </div>
    <!-- 提问搜索框结束 -->
</div>
<div style='height:110px'></div>
<!----------导航条---------->
<div id='nav'>
    <ul class='list'>
        <li class='nav-sel'><a href="" class='home'>问答首页</a></li>
        <li class='nav-sel ask-cate'>
            <a href="" class='ask-list'><span>问题库</span><i></i></a>
            <ul class='hidden'>
                <li>
                    <a href="">后盾PHP培训</a>
                </li>
                <li>
                    <a href="">后盾PHP培训</a>
                </li>
                <li>
                    <a href="">后盾PHP培训</a>
                </li>
                <li>
                    <a href="">后盾PHP培训</a>
                </li>
                <li>
                    <a href="">后盾PHP培训</a>
                </li>
                <li>
                    <a href="">后盾PHP培训</a>
                </li>
                <li>
                    <a href="">后盾PHP培训</a>
                </li>
                <li>
                    <a href="">后盾PHP培训</a>
                </li>
                <li>
                    <a href="">后盾PHP培训</a>
                </li>
                <li>
                    <a href="">后盾PHP培训</a>
                </li>
                <li>
                    <a href="">后盾PHP培训</a>
                </li>
            </ul>
        </li>
    </ul>
    <p class='total'>累计提问：1123211</p>
</div>

<!----------注册框---------->
<div id='register' class='hidden'>
    <div class='reg-title'>
        <p>欢迎注册后盾问答</p>
        <a href="" title='关闭' class='close-window'></a>
    </div>
    <div id='reg-wrap'>
        <div class='reg-left'>
            <ul>
                <li><span>账号注册</span></li>
            </ul>
            <div class='reg-l-bottom'>
                已有账号，<a href="" id='login-now'>马上登录</a>
            </div>
        </div>
        <div class='reg-right'>
            <form action="<?php echo url('Login/register');?>
" method="post" name='register'>
                <ul>
                    <li>
                        <label for="reg-uname">用户名</label>
                        <input type="text" name='user_account' id='reg-uname'/>
                        <span>邮箱号/手机号</span>
                    </li>
                    <li>
                        <label for="reg-pwd">密码</label>
                        <input type="password" name='user_pwd' id='reg-pwd'/>
                        <span>6-20个字符:字母、数字或下划线 _</span>
                    </li>
                    <li>
                        <label for="reg-pwded">确认密码</label>
                        <input type="password" name='user_repwd' id='reg-pwded'/>
                        <span>请再次输入密码</span>
                    </li>
                    <li>
                        <label for="reg-verify">验证码</label>
                        <input type="text" name='code' id='reg-verify'/>
                        <span status="0" style="display: inline-block;padding: 9px;border:1px solid #ccc;border-radius: 5px;cursor: pointer" id="sendCode">发送短信</span>
                        <span>请输入验证码</span>
                    </li>

                    <li class='submit'>
                        <input type="submit" value='立即注册'/>
                    </li>
                </ul>
            </form>
            <div class="login_method">
                <a href="<?php echo url('Login/qq_login');?>
"><img src="<?php echo resource();?>
home/images/Connect_logo_1.png"></a>
                <a href="<?php echo url('LOgin/weix_login');?>
"><img src="<?php echo resource();?>
home/images/weix.jpg" style="height: 16px;width: 16px;margin-left: 20px"></a>
                <a href="<?php echo url('LOgin/weib_login');?>
"><img src="<?php echo resource();?>
home/images/weib.jpg" style="height: 16px;width: 16px;margin-left: 20px"></a>

            </div>
        </div>
    </div>
</div>

<!----------登录框---------->
<div id='login' class='hidden'>
    <div class='login-title'>
        <p>欢迎您登录后盾问答</p>
        <a href="" title='关闭' class='close-window'></a>
    </div>
    <div class='login-form'>
        <span id='login-msg'></span>
        <!-- 登录FORM -->
        <form action="" method='post' name='login'>
            <ul>
                <li>
                    <label for="login-acc">账号</label>
                    <input type="text" name='account' class='input' id='login-acc'/>
                </li>
                <li>
                    <label for="login-pwd">密码</label>
                    <input type="password" name='pwd' class='input' id='login-pwd'/>
                </li>
                <li class='login-auto'>
                    <label for="auto-login">
                        <input type="checkbox" checked='checked' name='auto'  id='auto-login'/>&nbsp;下一次自动登录
                    </label>
                    <a href="" id='regis-now'>注册新账号</a>
                </li>
                <li>
                    <input type="submit" value='' id='login-btn'/>
                </li>
            </ul>
        </form>
    </div>
</div>

<!--背景遮罩--><div id='background' class='hidden'></div><?php }
}
