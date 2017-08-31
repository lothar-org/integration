<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>gvChart - 数据概况</title>
    <script type="text/javascript" src=""></script>
    <script type="text/javascript">
        gvChartInit();
        $(function(){
            /*ID 饼状图*/
            $('#todayin').gvChart({
                chartType: 'PieChart',
                gvSettings: {
                    vAxis: {title: '数据数量/个'},//Y轴
                    hAxis: {title: '日期'},//x轴
                    width: 1100,
                    height: 350
                }
            });
            /*ID 折线图*/
            $('#oldday').gvChart({
                chartType: 'LineChart',
                gvSettings: {
                    vAxis: {title: '数据数量/个'},//Y轴
                    hAxis: {title: '日期'},//x轴
                    width: 1100,
                    height: 350
                }
            });
        });
    </script>
</head>
<body>
    <div class="place">
        <span>位置：</span>
        <ul class="placeul">
            <li><a href="#">首页</a></li>
            <li><a href="#">工作台</a></li>
        </ul>
    </div>

    <div class="mainbox">
    <div class="mainleft">
    <div class="leftinfo">

        <div class="listtitle"><a href="#" class="more1">更多</a>数据统计</div>
            
        <div class="maintj">
            <table id='todayin'> 
                <caption>饼状图 - 地区分布统计</caption> 
                <thead> <tr> <th></th> <th>北京</th> <th>广州</th> <th>甘肃</th> <th>河南</th> <th>湖北</th> </tr> </thead> 
                <tbody> 
                    <tr> <th>695</th> <td>100</td> <td>94</td> <td>132</td> <td>213</td> <td>156</td> </tr> 
                </tbody>
            </table>
            
            <table id='oldday'>
                <caption>折线图 - 10天数据统计 2016-05-15 至 2016-05-24</caption> 
                <thead> <tr><th></th><th>2016-05-15</th> <th>2016-05-16</th> <th>2016-05-17</th> <th>2016-05-18</th> <th>2016-05-19</th> <th>2016-05-20</th><th>2016-05-21</th> <th>2016-05-22</th> <th>2016-05-23</th> <th>2016-05-24</th> </tr> </thead> 
                <tbody>
                    <tr> <th>增加</th> <td>1</td> <td>3</td> <td>2</td> <td>0</td> <td>5</td> <td>6</td> <td>4</td> <td>8</td> <td>2</td> <td>5</td> </tr>
                    <tr> <th>删除</th> <td>2</td> <td>2</td> <td>0</td> <td>0</td> <td>4</td> <td>1</td> <td>3</td> <td>0</td> <td>1</td> <td>0</td> </tr>
                    <tr> <th>拓展</th> <td>6</td> <td>9</td> <td>3</td> <td>0</td> <td>12</td> <td>19</td> <td>3</td> <td>0</td> <td>1</td> <td>6</td> </tr>
                </tbody> 
            </table>  

        </div>
        
    </div>
    <!--leftinfo end-->
    </div>
    <!--mainleft end-->
    </div>

    </body>
    <script type="text/javascript">
        setWidth();
        $(window).resize(function(){
            setWidth(); 
        });
        function setWidth(){
            var width = ($('.leftinfos').width()-12)/2;
            $('.infoleft,.inforight').width(width);
        }
    </script>
</body>
</html>