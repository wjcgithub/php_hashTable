 function Canvas(elem){
      if(elem=='' || !elem){
          alert('请输入参数');
          return;
      }

      this.parent = elem;
  }

  Canvas.prototype.id = 'canvas';
  Canvas.prototype.width = 500;
  Canvas.prototype.height = 500;
  Canvas.prototype.bg = '#ff9900';
  Canvas.prototype.cobj = null;
  Canvas.prototype.ctx = null;

  //创建canvas对象
  Canvas.prototype.c = function(){
      var elem = document.getElementById(this.parent);
      elem.style.width = this.width+"px";
      elem.style.height = this.height+"px";
      elem.innerHTML = "<canvas id=\""+this.id+"\" width=\""+this.width+"px\" height=\""+this.height+"px\">暂时不支持canvas</canvas>";
  }

  //获取canvas实例
  Canvas.prototype.getInstance = function (){
      Canvas.prototype.cobj = document.getElementById(this.id);
      return this.ctx = Canvas.prototype.cobj.getContext('2d');
  }

  //绘制图片
  Canvas.prototype.drawImg = function(){
      var _this = this;
      var img = new Image();
      img.src = '../img/rhino.jpg';
      img.onload = function(){
          //_this.ctx.drawImage(img,0,0);
          _this.ctx.transform(1,1,0,1,0,0);
          _this.ctx.drawImage(img,50,50,100,100);
          //_this.ctx.drawImage(img,10,10,100,100,10,10,100,100);
          //_this.ctx.drawImage(img,10,10,100,100,150,150,1000,1000);
      }
  }

/**
 * 角度转换弧度公式
 * @constructor
 */
  function Utils(){
      this.hd =  function(degree){
          return degree*Math.PI/180;
      }

  }

