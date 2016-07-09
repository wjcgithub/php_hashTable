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
          //参数值
          //参数值           描述
          //img                规定要使用的图像、画布或视频。
          //sx                可选。开始剪切的 x 坐标位置。
          //sy                可选。开始剪切的 y 坐标位置。
          //swidth        可选。被剪切图像的宽度。
          //sheight    可选。被剪切图像的高度。
          //x                    在画布上放置图像的 x 坐标位置。
          //y                    在画布上放置图像的 y 坐标位置。
          //width        可选。要使用的图像的宽度。（伸展或缩小图像）
          //height        可选。要使用的图像的高度。（伸展或缩小图像）

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

