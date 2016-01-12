<?php
function is_login(){
     return session('user_info.uid');
}
