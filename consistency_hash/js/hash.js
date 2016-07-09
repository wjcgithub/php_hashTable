window.onload = function (){
    //创建canvas对象
    var canvasObj = new Canvas('div1')
    var utils = new Utils()
    canvasObj.width = 600
    canvasObj.height = 600
    //生成canvas标签
    canvasObj.c()
    var ctx = canvasObj.getInstance()
    //hash环上的点阵数量
    var keyNum = Math.pow(2,32)-1
    //每个点阵的度数
    var oneKeyDegree = 360/keyNum
    var red = 'rgba(255,0,0,0.7)'
    var green = 'rgba(0,255,0,0.7)'
    var black = 'rgba(5,5,5,0.7)'

    //clear canvas
    ctx.clearRect(0,0,canvasObj.width,canvasObj.height)
    //画外层大圆
    var x = canvasObj.width/2
    var y = canvasObj.height/2
    var r = canvasObj.width/2.3
    ctx.beginPath()
    ctx.arc(x,y,r,utils.hd(0),utils.hd(360))
    ctx.stroke()
    ctx.save()

    function addLogo(){
        ctx.beginPath()
        ctx.fillStyle=red
        ctx.arc(30,30,20,utils.hd(0),utils.hd(360))
        ctx.fill()
        ctx.fillStyle=black
        ctx.fillText('服务器',30,30)

        ctx.beginPath()
        ctx.fillStyle=green
        ctx.arc(30,70,10,utils.hd(0),utils.hd(360))
        ctx.fill()
        ctx.fillStyle=black
        ctx.fillText('key',30,70)
        ctx.save()
    }

    //添加文字
    function addText(){
        ctx.save()
        ctx.font = '35px impact'
        ctx.textBaseLine = 'top'
        ctx.fillStyle = 'rgba(57,9,9,0.7)'
        ctx.shadowOffsetX = 10
        ctx.shadowOffsetY = 10
        ctx.shadowColor = 'rgba(5,9,9,0.7)'
        ctx.shadowBlur = 5
        var w = ctx.measureText('一致性Hash算法演示').width
        ctx.fillText('一致性Hash算法演示',(x*2-w)/2, y+25)
        ctx.restore()
        ctx.save()
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
            var cycleColor = red
        }else if(type==2){
            var radius = 4
            var cycleColor = green
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
        ctx.save()
    }

    //添加文字
    addText()
    addLogo()
    //加载缓存 todo

    setTimeout(function (){
        DrawCycle(keyNum*1/6,1)
    },1000)
    setTimeout(function (){
        DrawCycle(keyNum*2/6,1)
    },2000)
    setTimeout(function (){
        DrawCycle(keyNum*3/6,1)
    },3000)
    setTimeout(function (){
        DrawCycle(keyNum*4/6,1)
    },4000)
    setTimeout(function (){
        DrawCycle(keyNum*5/6,1)
    },5000)
    setTimeout(function (){
        DrawCycle(keyNum*6/6,1)
    },6000)
    setTimeout(function (){
        DrawCycle(keyNum*1/60,2)
    },6500)
    setTimeout(function (){
        DrawCycle(keyNum*4/60,2)
        DrawCycle(keyNum*31/350,2)
    },7000)
    setTimeout(function (){
        DrawCycle(keyNum*7/60,2)
        DrawCycle(keyNum*70/760,2)
    },7500)
    setTimeout(function (){
        DrawCycle(keyNum*3/60,2)
        DrawCycle(keyNum*321/560,2)
    },8000)
    setTimeout(function (){
        DrawCycle(keyNum*63/200,2)
        DrawCycle(keyNum*163/400,2)
    },8500)
    setTimeout(function (){
        DrawCycle(keyNum*53/160,2)
    },9000)
    setTimeout(function (){
        DrawCycle(keyNum*34/60,2)
        DrawCycle(keyNum*131/350,2)
    },9500)
    setTimeout(function (){
        DrawCycle(keyNum*45/60,2)
        DrawCycle(keyNum*245/960,2)
    },10000)
    setTimeout(function (){
        DrawCycle(keyNum*242/260,2)
    },10500)
    setTimeout(function (){
        DrawCycle(keyNum*345/460,2)
    },11000)


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




