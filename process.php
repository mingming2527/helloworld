<?php
/**
 * 入口函数 多进程实现
 * 将此文件保存为 ProcessOpera.php
 * 在terminal中运行 /usr/local/php/bin/php ProcessOpera.php &
 * 查看进程 ps aux|grep php
 */


ProcessOpera("runCode", array(), 8);

/**
 * run Code
 */
function runCode($opt = array()) {
    //需要在守护进程中运行的代码
//    echo "1\n";
}

/**
 * $func为子进程执行具体事物的函数名称
 * $opt为$func的参数 数组形式
 * $pNum 为fork的子进程数量
 */
function ProcessOpera($func, $opts = array(), $pNum = 1) {
    while(true) {

        //在当前进程当前位置产生分支（子进程）。译注：fork是创建了一个子进程，
        //父进程和子进程 都从fork的位置开始向下继续执行，不同的是父进程执行过程中，得到的fork返回值为子进程 号，而子进程得到的是0。
        $pid = pcntl_fork();

        if($pid == -1) {
            exit("pid fork error");
        }
        if($pid) {
            //父进程
            static $execute = 0;
            $execute++;
            if($execute >= $pNum) {
                //当进程数量达到一定数量时候，就对子进程进行回收。
                pcntl_wait($status);
                $execute--;
            }
        } else {
            //子进程
            while(true) {
                //somecode
                $func($opts);
                sleep(1);
            }
            exit(0);
        }
    }
}