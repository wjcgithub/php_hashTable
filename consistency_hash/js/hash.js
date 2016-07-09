/**
 * Created by evolution on 15-9-19.
 */
window.onload = function (){
    //创建canvas对象
    var canvasObj = new Canvas('div1')
    var utils = new Utils()
    canvasObj.width = 1000
    canvasObj.height = 890
    //生成canvas标签
    canvasObj.c()
    var ctx = canvasObj.getInstance()
    //hash环上的点阵数量
    var keyNum = Math.pow(2,32)-1
    //每个点阵的度数
    var oneKeyDegree = 360/keyNum

    //clear canvas
    ctx.clearRect(0,0,canvasObj.width,canvasObj.height)

    //画外层大圆
    var x = canvasObj.width/2
    var y = canvasObj.height/2
    var r = canvasObj.width/2.3
    ctx.beginPath()
    ctx.arc(x,y,r,utils.hd(0),utils.hd(360))
    ctx.closePath()
    ctx.stroke()

    //添加文字
    function addText(){
        ctx.save()
        ctx.font = '60px impact'
        ctx.textBaseLine = 'top'
        ctx.fillStyle = 'rgba(57,9,9,0.7)'
        ctx.shadowOffsetX = 10
        ctx.shadowOffsetY = 10
        ctx.shadowColor = 'rgba(5,9,9,0.7)'
        ctx.shadowBlur = 5
        var w = ctx.measureText('一致性Hash算法演示').width
        ctx.fillText('一致性Hash算法演示',(x*2-w)/2, y+25)
        ctx.restore()
    }

    /**
     * 根据索引画圆
     * @param index
     * @param type
     * @constructor
     */
    function DrawCycle(index,type){
        //画圆上的坐标点
        //圆O的圆心为(a,b),半径为R,点A与到X轴的为角α.
        //则点A的坐标为(a+R*cosα,b+R*sinα)

        if(type==1){
            var radius = 8
            var cycleColor = 'rgba(255,0,0,0.7)'
        }else if(type==2){
            var radius = 4
            var cycleColor = 'rgba(0,255,0,0.7)'
        }

        ctx.beginPath()
        ctx.moveTo(x,y)
        var linex = Math.cos(oneKeyDegree*index*Math.PI/180)*r+x
        var liney = Math.sin(oneKeyDegree*index*Math.PI/180)*r+y
        ctx.lineTo(linex,liney)
        ctx.arc(linex,liney,radius,utils.hd(0),utils.hd(360))
        ctx.fillStyle = cycleColor
        ctx.strokeStyle = cycleColor
        ctx.fill()
        ctx.stroke()
    }

    //添加文字
    addText()
    //加载缓存

    localStorage.setItem("key","value")
    //alert(localStorage.getItem("key"))
    //localStorage.removeItem("key")
    //localStorage.clear()

    function addServer(){
        var val = document.getElementById('serverval').value
        getIndex(val,1)
    }

    function addKey(){
        var val = document.getElementById('keyval').value
        getIndex(val,2)
    }

    function getIndex(val,type){
        $.get("http://local.demo.com/php_file/hash/consistency_hash/hash.php?key=21", { "key": val },
            function(req) {
                DrawCycle(req,type)
            })
    }

    document.getElementById('addserver').onclick = addServer
    document.getElementById('addkey').onclick = addKey

}




