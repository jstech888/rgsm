// file: bwipp/planet.js
//
// This code was automatically generated from:
// Barcode Writer in Pure PostScript - Version 2013-01-25
//
// Copyright (c) 2011-2013 Mark Warren
// Copyright (c) 2004-2013 Terry Burton
//
// See the LICENSE file in the bwip.js root directory
// for the extended copyright notice.
// BEGIN planet
if (!BWIPJS.bwipp["renlinear"]) BWIPJS.load("bwipp/renlinear.js");
BWIPJS.bwipp["planet"]=function() {
	this.dict["renlinear"]=BWIPJS.bwipp["renlinear"];
	function $f0(){
		return -1;
	}
	function $f1(){
		var t=this.stk[this.ptr-2]; this.stk[this.ptr-2]=this.stk[this.ptr-1]; this.stk[this.ptr-1]=t;
		this.ptr--;
		var t=this.stk[this.ptr-2]; this.stk[this.ptr-2]=this.stk[this.ptr-1]; this.stk[this.ptr-1]=t;
		this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	}
	function $f2(){
		this.stk[this.ptr++]=true;
		this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	}
	function $f3(){
		var a=/^\s*([^\s]+)(\s+.*)?$/.exec(this.stk[this.ptr-1]);
		if (a) {
			this.stk[this.ptr-1]=BWIPJS.psstring(a[2]===undefined?"":a[2]);
			this.stk[this.ptr++]=BWIPJS.psstring(a[1]);
			this.stk[this.ptr++]=true;
		} else {
			this.stk[this.ptr-1]=false;
		}
		this.stk[this.ptr++]=false;
		if (this.stk[this.ptr-2] instanceof BWIPJS.psstring)
			this.stk[this.ptr-2]=this.stk[this.ptr-2].toString()==this.stk[this.ptr-1];
		else this.stk[this.ptr-2]=this.stk[this.ptr-2]==this.stk[this.ptr-1];
		this.ptr--;
		this.stk[this.ptr++]=$f0;
		var t0=this.stk[--this.ptr];
		if (this.stk[--this.ptr]) {
			if (t0.call(this)==-1) return -1;
		}
		this.stk[this.ptr]=this.stk[this.ptr-1]; this.ptr++;
		if (typeof(this.stk[this.ptr-1].length)!=="number") throw "length: invalid: " + BWIPJS.pstype(this.stk[this.ptr-1]);
		this.stk[this.ptr-1]=this.stk[this.ptr-1].length;
		this.stk[this.ptr-1]=BWIPJS.psstring(this.stk[this.ptr-1]);
		var t=this.stk[this.ptr-2].toString();
		this.stk[this.ptr-1].assign(0,t);
		this.stk[this.ptr-2]=this.stk[this.ptr-1].subset(0,t.length);
		this.ptr--;
		this.stk[this.ptr++]=BWIPJS.psstring("=");
		var h=this.stk[this.ptr-2];
		var t=h.indexOf(this.stk[this.ptr-1]);
		if (t==-1) {
			this.stk[this.ptr-1]=false;
		} else {
			this.stk[this.ptr-2]=h.subset(t+this.stk[this.ptr-1].length);
			this.stk[this.ptr-1]=h.subset(t,this.stk[this.ptr-1].length);
			this.stk[this.ptr++]=h.subset(0,t);
			this.stk[this.ptr++]=true;
		}
		this.stk[this.ptr++]=true;
		if (this.stk[this.ptr-2] instanceof BWIPJS.psstring)
			this.stk[this.ptr-2]=this.stk[this.ptr-2].toString()==this.stk[this.ptr-1];
		else this.stk[this.ptr-2]=this.stk[this.ptr-2]==this.stk[this.ptr-1];
		this.ptr--;
		this.stk[this.ptr++]=$f1;
		this.stk[this.ptr++]=$f2;
		var t1=this.stk[--this.ptr];
		var t2=this.stk[--this.ptr];
		if (this.stk[--this.ptr]) {
			if (t2.call(this)==-1) return -1;
		} else {
			if (t1.call(this)==-1) return -1;
		}
	}
	function $f4(){
		this.stk[this.ptr++]=1;
		this.stk[this.ptr-1]={};
		this.dict=this.stk[--this.ptr]; this.dstk.push(this.dict);
		var t=this.dstk.get("options");
		if (t===undefined) throw new Error("dict: options: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		this.stk[this.ptr++]=$f3;
		var t3=this.stk[--this.ptr];
		while (true) {
			if (t3.call(this)==-1) break;
		}
		this.stk[this.ptr++]=this.dict;
		this.dstk.pop(); this.dict=this.dstk[this.dstk.length-1];
		this.stk[this.ptr++]="options"; //ident
		var t=this.stk[this.ptr-2]; this.stk[this.ptr-2]=this.stk[this.ptr-1]; this.stk[this.ptr-1]=t;
		this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	}
	function $f5(){
		this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	}
	function $f6(){
		this.stk[this.ptr++]="barlen"; //ident
		this.stk[this.ptr++]=-1;
		this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	}
	function $f7(){
		this.stk[this.ptr++]="barlen"; //ident
		this.stk[this.ptr++]=13;
		this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	}
	function $f8(){
		this.stk[this.ptr++]="barlen"; //ident
		this.stk[this.ptr++]=11;
		this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	}
	function $f9(){
		var t=this.dstk.get("barlen");
		if (t===undefined) throw new Error("dict: barlen: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		this.stk[this.ptr++]=13;
		this.stk[this.ptr-2]=this.stk[this.ptr-2]>=this.stk[this.ptr-1]; this.ptr--;
		this.stk[this.ptr++]=$f7;
		this.stk[this.ptr++]=$f8;
		var t8=this.stk[--this.ptr];
		var t9=this.stk[--this.ptr];
		if (this.stk[--this.ptr]) {
			if (t9.call(this)==-1) return -1;
		} else {
			if (t8.call(this)==-1) return -1;
		}
	}
	function $f10(){
		this.stk[this.ptr++]="j"; //ident
		var t=this.stk[this.ptr-2]; this.stk[this.ptr-2]=this.stk[this.ptr-1]; this.stk[this.ptr-1]=t;
		this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
		var t=this.dstk.get("heights");
		if (t===undefined) throw new Error("dict: heights: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("j");
		if (t===undefined) throw new Error("dict: j: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("enc");
		if (t===undefined) throw new Error("dict: enc: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("j");
		if (t===undefined) throw new Error("dict: j: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		this.stk[this.ptr++]=1;
		this.stk[this.ptr-3]=this.stk[this.ptr-3].subset(this.stk[this.ptr-2],this.stk[this.ptr-1]); this.ptr-=2;
		this.stk[this.ptr-1]=parseInt(this.stk[this.ptr-1],10);
		var t=this.dstk.get("height");
		if (t===undefined) throw new Error("dict: height: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		this.stk[this.ptr-2]=this.stk[this.ptr-2]*this.stk[this.ptr-1]; this.ptr--;
		this.stk[this.ptr++]=5;
		this.stk[this.ptr-2]=this.stk[this.ptr-2]/this.stk[this.ptr-1]; this.ptr--;
		if (this.stk[this.ptr-3] instanceof BWIPJS.psstring || this.stk[this.ptr-3] instanceof BWIPJS.psarray)
			this.stk[this.ptr-3].set(this.stk[this.ptr-2], this.stk[this.ptr-1]);
		else this.stk[this.ptr-3][this.stk[this.ptr-2].toString()]=this.stk[this.ptr-1];
		this.ptr-=3;
	}
	function $f11(){
		this.stk[this.ptr++]="j"; //ident
		var t=this.stk[this.ptr-2]; this.stk[this.ptr-2]=this.stk[this.ptr-1]; this.stk[this.ptr-1]=t;
		this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
		var t=this.dstk.get("heights");
		if (t===undefined) throw new Error("dict: heights: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("j");
		if (t===undefined) throw new Error("dict: j: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("enc");
		if (t===undefined) throw new Error("dict: enc: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("j");
		if (t===undefined) throw new Error("dict: j: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		this.stk[this.ptr++]=1;
		this.stk[this.ptr-3]=this.stk[this.ptr-3].subset(this.stk[this.ptr-2],this.stk[this.ptr-1]); this.ptr-=2;
		this.stk[this.ptr-1]=parseInt(this.stk[this.ptr-1],10);
		var t=this.dstk.get("height");
		if (t===undefined) throw new Error("dict: height: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		this.stk[this.ptr-2]=this.stk[this.ptr-2]*this.stk[this.ptr-1]; this.ptr--;
		this.stk[this.ptr++]=5;
		this.stk[this.ptr-2]=this.stk[this.ptr-2]/this.stk[this.ptr-1]; this.ptr--;
		if (this.stk[this.ptr-3] instanceof BWIPJS.psstring || this.stk[this.ptr-3] instanceof BWIPJS.psarray)
			this.stk[this.ptr-3].set(this.stk[this.ptr-2], this.stk[this.ptr-1]);
		else this.stk[this.ptr-3][this.stk[this.ptr-2].toString()]=this.stk[this.ptr-1];
		this.ptr-=3;
	}
	function $f12(){
		this.stk[this.ptr++]="i"; //ident
		var t=this.stk[this.ptr-2]; this.stk[this.ptr-2]=this.stk[this.ptr-1]; this.stk[this.ptr-1]=t;
		this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
		var t=this.dstk.get("barcode");
		if (t===undefined) throw new Error("dict: barcode: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("i");
		if (t===undefined) throw new Error("dict: i: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		this.stk[this.ptr++]=1;
		this.stk[this.ptr-3]=this.stk[this.ptr-3].subset(this.stk[this.ptr-2],this.stk[this.ptr-1]); this.ptr-=2;
		var t=this.dstk.get("barchars");
		if (t===undefined) throw new Error("dict: barchars: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.stk[this.ptr-2]; this.stk[this.ptr-2]=this.stk[this.ptr-1]; this.stk[this.ptr-1]=t;
		var h=this.stk[this.ptr-2];
		var t=h.indexOf(this.stk[this.ptr-1]);
		if (t==-1) {
			this.stk[this.ptr-1]=false;
		} else {
			this.stk[this.ptr-2]=h.subset(t+this.stk[this.ptr-1].length);
			this.stk[this.ptr-1]=h.subset(t,this.stk[this.ptr-1].length);
			this.stk[this.ptr++]=h.subset(0,t);
			this.stk[this.ptr++]=true;
		}
		this.ptr--;
		if (typeof(this.stk[this.ptr-1].length)!=="number") throw "length: invalid: " + BWIPJS.pstype(this.stk[this.ptr-1]);
		this.stk[this.ptr-1]=this.stk[this.ptr-1].length;
		this.stk[this.ptr++]="indx"; //ident
		var t=this.stk[this.ptr-2]; this.stk[this.ptr-2]=this.stk[this.ptr-1]; this.stk[this.ptr-1]=t;
		this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
		this.ptr--;
		this.ptr--;
		this.stk[this.ptr++]="enc"; //ident
		var t=this.dstk.get("encs");
		if (t===undefined) throw new Error("dict: encs: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("indx");
		if (t===undefined) throw new Error("dict: indx: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		if (this.stk[this.ptr-2] instanceof BWIPJS.psstring || this.stk[this.ptr-2] instanceof BWIPJS.psarray)
			this.stk[this.ptr-2]=this.stk[this.ptr-2].get(this.stk[this.ptr-1]);
		else this.stk[this.ptr-2]=this.stk[this.ptr-2][this.stk[this.ptr-1].toString()];
		this.ptr--;
		this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
		this.stk[this.ptr++]="heights"; //ident
		var t=this.dstk.get("enc");
		if (t===undefined) throw new Error("dict: enc: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		if (typeof(this.stk[this.ptr-1].length)!=="number") throw "length: invalid: " + BWIPJS.pstype(this.stk[this.ptr-1]);
		this.stk[this.ptr-1]=this.stk[this.ptr-1].length;
		this.stk[this.ptr-1]=BWIPJS.psarray(this.stk[this.ptr-1]);
		this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
		this.stk[this.ptr++]=0;
		this.stk[this.ptr++]=1;
		var t=this.dstk.get("enc");
		if (t===undefined) throw new Error("dict: enc: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		if (typeof(this.stk[this.ptr-1].length)!=="number") throw "length: invalid: " + BWIPJS.pstype(this.stk[this.ptr-1]);
		this.stk[this.ptr-1]=this.stk[this.ptr-1].length;
		this.stk[this.ptr++]=1;
		this.stk[this.ptr-2]=this.stk[this.ptr-2]-this.stk[this.ptr-1]; this.ptr--;
		this.stk[this.ptr++]=$f11;
		var t21=this.stk[--this.ptr];
		var t19=this.stk[--this.ptr];
		var t18=this.stk[--this.ptr];
		var t17=this.stk[--this.ptr];
		for (var t20=t17; t18<0 ? t20>=t19 : t20<=t19; t20+=t18) {
			this.stk[this.ptr++]=t20;
			if (t21.call(this)==-1) break;
		}
		var t=this.dstk.get("bhs");
		if (t===undefined) throw new Error("dict: bhs: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("i");
		if (t===undefined) throw new Error("dict: i: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		this.stk[this.ptr++]=5;
		this.stk[this.ptr-2]=this.stk[this.ptr-2]*this.stk[this.ptr-1]; this.ptr--;
		this.stk[this.ptr++]=1;
		this.stk[this.ptr-2]=this.stk[this.ptr-2]+this.stk[this.ptr-1]; this.ptr--;
		var t=this.dstk.get("heights");
		if (t===undefined) throw new Error("dict: heights: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		this.stk[this.ptr-3].assign(this.stk[this.ptr-2],this.stk[this.ptr-1]); this.ptr-=3;
		var t=this.dstk.get("txt");
		if (t===undefined) throw new Error("dict: txt: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("i");
		if (t===undefined) throw new Error("dict: i: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		this.stk[this.ptr++]=Infinity;
		var t=this.dstk.get("barcode");
		if (t===undefined) throw new Error("dict: barcode: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("i");
		if (t===undefined) throw new Error("dict: i: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		this.stk[this.ptr++]=1;
		this.stk[this.ptr-3]=this.stk[this.ptr-3].subset(this.stk[this.ptr-2],this.stk[this.ptr-1]); this.ptr-=2;
		var t=this.dstk.get("i");
		if (t===undefined) throw new Error("dict: i: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		this.stk[this.ptr++]=5;
		this.stk[this.ptr-2]=this.stk[this.ptr-2]*this.stk[this.ptr-1]; this.ptr--;
		this.stk[this.ptr++]=1;
		this.stk[this.ptr-2]=this.stk[this.ptr-2]+this.stk[this.ptr-1]; this.ptr--;
		this.stk[this.ptr++]=3.312;
		this.stk[this.ptr-2]=this.stk[this.ptr-2]*this.stk[this.ptr-1]; this.ptr--;
		var t=this.dstk.get("textyoffset");
		if (t===undefined) throw new Error("dict: textyoffset: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("textfont");
		if (t===undefined) throw new Error("dict: textfont: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("textsize");
		if (t===undefined) throw new Error("dict: textsize: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		for (var i = this.ptr-1; i >= 0 && this.stk[i] !== Infinity; i--) ;
		if (i < 0) throw "array: underflow";
		var t = this.stk.splice(i+1, this.ptr-1-i);
		this.ptr = i;
		this.stk[this.ptr++]=BWIPJS.psarray(t);
		if (this.stk[this.ptr-3] instanceof BWIPJS.psstring || this.stk[this.ptr-3] instanceof BWIPJS.psarray)
			this.stk[this.ptr-3].set(this.stk[this.ptr-2], this.stk[this.ptr-1]);
		else this.stk[this.ptr-3][this.stk[this.ptr-2].toString()]=this.stk[this.ptr-1];
		this.ptr-=3;
		this.stk[this.ptr++]="checksum"; //ident
		var t=this.dstk.get("checksum");
		if (t===undefined) throw new Error("dict: checksum: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("indx");
		if (t===undefined) throw new Error("dict: indx: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		this.stk[this.ptr-2]=this.stk[this.ptr-2]+this.stk[this.ptr-1]; this.ptr--;
		this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	}
	function $f13(){
		this.stk[this.ptr++]="j"; //ident
		var t=this.stk[this.ptr-2]; this.stk[this.ptr-2]=this.stk[this.ptr-1]; this.stk[this.ptr-1]=t;
		this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
		var t=this.dstk.get("heights");
		if (t===undefined) throw new Error("dict: heights: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("j");
		if (t===undefined) throw new Error("dict: j: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("enc");
		if (t===undefined) throw new Error("dict: enc: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("j");
		if (t===undefined) throw new Error("dict: j: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		this.stk[this.ptr++]=1;
		this.stk[this.ptr-3]=this.stk[this.ptr-3].subset(this.stk[this.ptr-2],this.stk[this.ptr-1]); this.ptr-=2;
		this.stk[this.ptr-1]=parseInt(this.stk[this.ptr-1],10);
		var t=this.dstk.get("height");
		if (t===undefined) throw new Error("dict: height: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		this.stk[this.ptr-2]=this.stk[this.ptr-2]*this.stk[this.ptr-1]; this.ptr--;
		this.stk[this.ptr++]=5;
		this.stk[this.ptr-2]=this.stk[this.ptr-2]/this.stk[this.ptr-1]; this.ptr--;
		if (this.stk[this.ptr-3] instanceof BWIPJS.psstring || this.stk[this.ptr-3] instanceof BWIPJS.psarray)
			this.stk[this.ptr-3].set(this.stk[this.ptr-2], this.stk[this.ptr-1]);
		else this.stk[this.ptr-3][this.stk[this.ptr-2].toString()]=this.stk[this.ptr-1];
		this.ptr-=3;
	}
	function $f14(){
		var t=this.dstk.get("txt");
		if (t===undefined) throw new Error("dict: txt: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("barlen");
		if (t===undefined) throw new Error("dict: barlen: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		this.stk[this.ptr++]=Infinity;
		var t=this.dstk.get("barchars");
		if (t===undefined) throw new Error("dict: barchars: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("checksum");
		if (t===undefined) throw new Error("dict: checksum: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		this.stk[this.ptr++]=1;
		this.stk[this.ptr-3]=this.stk[this.ptr-3].subset(this.stk[this.ptr-2],this.stk[this.ptr-1]); this.ptr-=2;
		var t=this.dstk.get("barlen");
		if (t===undefined) throw new Error("dict: barlen: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		this.stk[this.ptr++]=5;
		this.stk[this.ptr-2]=this.stk[this.ptr-2]*this.stk[this.ptr-1]; this.ptr--;
		this.stk[this.ptr++]=1;
		this.stk[this.ptr-2]=this.stk[this.ptr-2]+this.stk[this.ptr-1]; this.ptr--;
		this.stk[this.ptr++]=3.312;
		this.stk[this.ptr-2]=this.stk[this.ptr-2]*this.stk[this.ptr-1]; this.ptr--;
		var t=this.dstk.get("textyoffset");
		if (t===undefined) throw new Error("dict: textyoffset: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("textfont");
		if (t===undefined) throw new Error("dict: textfont: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("textsize");
		if (t===undefined) throw new Error("dict: textsize: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		for (var i = this.ptr-1; i >= 0 && this.stk[i] !== Infinity; i--) ;
		if (i < 0) throw "array: underflow";
		var t = this.stk.splice(i+1, this.ptr-1-i);
		this.ptr = i;
		this.stk[this.ptr++]=BWIPJS.psarray(t);
		if (this.stk[this.ptr-3] instanceof BWIPJS.psstring || this.stk[this.ptr-3] instanceof BWIPJS.psarray)
			this.stk[this.ptr-3].set(this.stk[this.ptr-2], this.stk[this.ptr-1]);
		else this.stk[this.ptr-3][this.stk[this.ptr-2].toString()]=this.stk[this.ptr-1];
		this.ptr-=3;
	}
	function $f15(){
		var t=this.dstk.get("txt");
		if (t===undefined) throw new Error("dict: txt: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("barlen");
		if (t===undefined) throw new Error("dict: barlen: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		this.stk[this.ptr++]=Infinity;
		this.stk[this.ptr++]=BWIPJS.psstring(" ");
		var t=this.dstk.get("barlen");
		if (t===undefined) throw new Error("dict: barlen: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		this.stk[this.ptr++]=5;
		this.stk[this.ptr-2]=this.stk[this.ptr-2]*this.stk[this.ptr-1]; this.ptr--;
		this.stk[this.ptr++]=1;
		this.stk[this.ptr-2]=this.stk[this.ptr-2]+this.stk[this.ptr-1]; this.ptr--;
		this.stk[this.ptr++]=72;
		this.stk[this.ptr-2]=this.stk[this.ptr-2]*this.stk[this.ptr-1]; this.ptr--;
		this.stk[this.ptr++]=25;
		this.stk[this.ptr-2]=this.stk[this.ptr-2]/this.stk[this.ptr-1]; this.ptr--;
		var t=this.dstk.get("textyoffset");
		if (t===undefined) throw new Error("dict: textyoffset: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("textfont");
		if (t===undefined) throw new Error("dict: textfont: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("textsize");
		if (t===undefined) throw new Error("dict: textsize: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		for (var i = this.ptr-1; i >= 0 && this.stk[i] !== Infinity; i--) ;
		if (i < 0) throw "array: underflow";
		var t = this.stk.splice(i+1, this.ptr-1-i);
		this.ptr = i;
		this.stk[this.ptr++]=BWIPJS.psarray(t);
		if (this.stk[this.ptr-3] instanceof BWIPJS.psstring || this.stk[this.ptr-3] instanceof BWIPJS.psarray)
			this.stk[this.ptr-3].set(this.stk[this.ptr-2], this.stk[this.ptr-1]);
		else this.stk[this.ptr-3][this.stk[this.ptr-2].toString()]=this.stk[this.ptr-1];
		this.ptr-=3;
	}
	function $f16(){
		this.stk[this.ptr++]="j"; //ident
		var t=this.stk[this.ptr-2]; this.stk[this.ptr-2]=this.stk[this.ptr-1]; this.stk[this.ptr-1]=t;
		this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
		var t=this.dstk.get("heights");
		if (t===undefined) throw new Error("dict: heights: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("j");
		if (t===undefined) throw new Error("dict: j: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("enc");
		if (t===undefined) throw new Error("dict: enc: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		var t=this.dstk.get("j");
		if (t===undefined) throw new Error("dict: j: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		this.stk[this.ptr++]=1;
		this.stk[this.ptr-3]=this.stk[this.ptr-3].subset(this.stk[this.ptr-2],this.stk[this.ptr-1]); this.ptr-=2;
		this.stk[this.ptr-1]=parseInt(this.stk[this.ptr-1],10);
		var t=this.dstk.get("height");
		if (t===undefined) throw new Error("dict: height: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
		this.stk[this.ptr-2]=this.stk[this.ptr-2]*this.stk[this.ptr-1]; this.ptr--;
		this.stk[this.ptr++]=5;
		this.stk[this.ptr-2]=this.stk[this.ptr-2]/this.stk[this.ptr-1]; this.ptr--;
		if (this.stk[this.ptr-3] instanceof BWIPJS.psstring || this.stk[this.ptr-3] instanceof BWIPJS.psarray)
			this.stk[this.ptr-3].set(this.stk[this.ptr-2], this.stk[this.ptr-1]);
		else this.stk[this.ptr-3][this.stk[this.ptr-2].toString()]=this.stk[this.ptr-1];
		this.ptr-=3;
	}
	function $f17(){
		this.stk[this.ptr++]=0;
	}
	function $f18(){
		this.stk[this.ptr++]=1.44;
		this.stk[this.ptr++]=1.872;
	}
	function $f19(){
		this.stk[this.ptr++]="txt"; //ident
		var t=this.dstk.get("txt");
		if (t===undefined) throw new Error("dict: txt: undefined");
		if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	}
	this.stk[this.ptr++]=20;
	this.stk[this.ptr-1]={};
	this.dict=this.stk[--this.ptr]; this.dstk.push(this.dict);
	this.stk[this.ptr++]="options"; //ident
	var t=this.stk[this.ptr-2]; this.stk[this.ptr-2]=this.stk[this.ptr-1]; this.stk[this.ptr-1]=t;
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	this.stk[this.ptr++]="barcode"; //ident
	var t=this.stk[this.ptr-2]; this.stk[this.ptr-2]=this.stk[this.ptr-1]; this.stk[this.ptr-1]=t;
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	this.stk[this.ptr++]="dontdraw"; //ident
	this.stk[this.ptr++]=false;
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	this.stk[this.ptr++]="includetext"; //ident
	this.stk[this.ptr++]=false;
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	this.stk[this.ptr++]="includecheckintext"; //ident
	this.stk[this.ptr++]=false;
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	this.stk[this.ptr++]="textfont"; //ident
	this.stk[this.ptr++]="Courier"; //ident
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	this.stk[this.ptr++]="textsize"; //ident
	this.stk[this.ptr++]=10;
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	this.stk[this.ptr++]="textyoffset"; //ident
	this.stk[this.ptr++]=-7;
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	this.stk[this.ptr++]="height"; //ident
	this.stk[this.ptr++]=0.125;
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	var t=this.dstk.get("options");
	if (t===undefined) throw new Error("dict: options: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr-1]=BWIPJS.pstype(this.stk[this.ptr-1]);
	this.stk[this.ptr++]="stringtype"; //ident
	if (this.stk[this.ptr-2] instanceof BWIPJS.psstring)
		this.stk[this.ptr-2]=this.stk[this.ptr-2].toString()==this.stk[this.ptr-1];
	else this.stk[this.ptr-2]=this.stk[this.ptr-2]==this.stk[this.ptr-1];
	this.ptr--;
	this.stk[this.ptr++]=$f4;
	var t4=this.stk[--this.ptr];
	if (this.stk[--this.ptr]) {
		if (t4.call(this)==-1) return -1;
	}
	var t=this.dstk.get("options");
	if (t===undefined) throw new Error("dict: options: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr++]=$f5;
	var t7=this.stk[--this.ptr];
	var t6=this.stk[--this.ptr];
	for (t5 in t6) {
		if (t6 instanceof BWIPJS.psstring || t6 instanceof BWIPJS.psarray) {
			if (t5.charCodeAt(0) > 57) continue;
			this.stk[this.ptr++]=t6.get(t5);
		} else {
			this.stk[this.ptr++]=t5;
			this.stk[this.ptr++]=t6[t5];
		}
		if (t7.call(this)==-1) break;
	}
	this.stk[this.ptr++]="textfont"; //ident
	var t=this.dstk.get("textfont");
	if (t===undefined) throw new Error("dict: textfont: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	this.stk[this.ptr++]="textsize"; //ident
	var t=this.dstk.get("textsize");
	if (t===undefined) throw new Error("dict: textsize: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr-1]=parseFloat(this.stk[this.ptr-1]);
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	this.stk[this.ptr++]="textyoffset"; //ident
	var t=this.dstk.get("textyoffset");
	if (t===undefined) throw new Error("dict: textyoffset: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr-1]=parseFloat(this.stk[this.ptr-1]);
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	this.stk[this.ptr++]="height"; //ident
	var t=this.dstk.get("height");
	if (t===undefined) throw new Error("dict: height: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr-1]=parseFloat(this.stk[this.ptr-1]);
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	this.stk[this.ptr++]="barlen"; //ident
	var t=this.dstk.get("barcode");
	if (t===undefined) throw new Error("dict: barcode: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	if (typeof(this.stk[this.ptr-1].length)!=="number") throw "length: invalid: " + BWIPJS.pstype(this.stk[this.ptr-1]);
	this.stk[this.ptr-1]=this.stk[this.ptr-1].length;
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	var t=this.dstk.get("barlen");
	if (t===undefined) throw new Error("dict: barlen: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr++]=11;
	this.stk[this.ptr-2]=this.stk[this.ptr-2]<this.stk[this.ptr-1]; this.ptr--;
	this.stk[this.ptr++]=$f6;
	this.stk[this.ptr++]=$f9;
	var t10=this.stk[--this.ptr];
	var t11=this.stk[--this.ptr];
	if (this.stk[--this.ptr]) {
		if (t11.call(this)==-1) return -1;
	} else {
		if (t10.call(this)==-1) return -1;
	}
	this.stk[this.ptr++]="encs"; //ident
	this.stk[this.ptr++]=BWIPJS.psarray([BWIPJS.psstring("22555"),BWIPJS.psstring("55522"),BWIPJS.psstring("55252"),BWIPJS.psstring("55225"),BWIPJS.psstring("52552"),BWIPJS.psstring("52525"),BWIPJS.psstring("52255"),BWIPJS.psstring("25552"),BWIPJS.psstring("25525"),BWIPJS.psstring("25255"),BWIPJS.psstring("5"),BWIPJS.psstring("5")]);
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	this.stk[this.ptr++]="barchars"; //ident
	this.stk[this.ptr++]=BWIPJS.psstring("0123456789");
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	this.stk[this.ptr++]="bhs"; //ident
	var t=this.dstk.get("barlen");
	if (t===undefined) throw new Error("dict: barlen: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr++]=5;
	this.stk[this.ptr-2]=this.stk[this.ptr-2]*this.stk[this.ptr-1]; this.ptr--;
	this.stk[this.ptr++]=7;
	this.stk[this.ptr-2]=this.stk[this.ptr-2]+this.stk[this.ptr-1]; this.ptr--;
	this.stk[this.ptr-1]=BWIPJS.psarray(this.stk[this.ptr-1]);
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	this.stk[this.ptr++]="txt"; //ident
	var t=this.dstk.get("barlen");
	if (t===undefined) throw new Error("dict: barlen: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr++]=1;
	this.stk[this.ptr-2]=this.stk[this.ptr-2]+this.stk[this.ptr-1]; this.ptr--;
	this.stk[this.ptr-1]=BWIPJS.psarray(this.stk[this.ptr-1]);
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	this.stk[this.ptr++]="enc"; //ident
	var t=this.dstk.get("encs");
	if (t===undefined) throw new Error("dict: encs: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr++]=10;
	if (this.stk[this.ptr-2] instanceof BWIPJS.psstring || this.stk[this.ptr-2] instanceof BWIPJS.psarray)
		this.stk[this.ptr-2]=this.stk[this.ptr-2].get(this.stk[this.ptr-1]);
	else this.stk[this.ptr-2]=this.stk[this.ptr-2][this.stk[this.ptr-1].toString()];
	this.ptr--;
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	this.stk[this.ptr++]="heights"; //ident
	var t=this.dstk.get("enc");
	if (t===undefined) throw new Error("dict: enc: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	if (typeof(this.stk[this.ptr-1].length)!=="number") throw "length: invalid: " + BWIPJS.pstype(this.stk[this.ptr-1]);
	this.stk[this.ptr-1]=this.stk[this.ptr-1].length;
	this.stk[this.ptr-1]=BWIPJS.psarray(this.stk[this.ptr-1]);
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	this.stk[this.ptr++]=0;
	this.stk[this.ptr++]=1;
	var t=this.dstk.get("enc");
	if (t===undefined) throw new Error("dict: enc: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	if (typeof(this.stk[this.ptr-1].length)!=="number") throw "length: invalid: " + BWIPJS.pstype(this.stk[this.ptr-1]);
	this.stk[this.ptr-1]=this.stk[this.ptr-1].length;
	this.stk[this.ptr++]=1;
	this.stk[this.ptr-2]=this.stk[this.ptr-2]-this.stk[this.ptr-1]; this.ptr--;
	this.stk[this.ptr++]=$f10;
	var t16=this.stk[--this.ptr];
	var t14=this.stk[--this.ptr];
	var t13=this.stk[--this.ptr];
	var t12=this.stk[--this.ptr];
	for (var t15=t12; t13<0 ? t15>=t14 : t15<=t14; t15+=t13) {
		this.stk[this.ptr++]=t15;
		if (t16.call(this)==-1) break;
	}
	var t=this.dstk.get("bhs");
	if (t===undefined) throw new Error("dict: bhs: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr++]=0;
	var t=this.dstk.get("heights");
	if (t===undefined) throw new Error("dict: heights: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr-3].assign(this.stk[this.ptr-2],this.stk[this.ptr-1]); this.ptr-=3;
	this.stk[this.ptr++]="checksum"; //ident
	this.stk[this.ptr++]=0;
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	this.stk[this.ptr++]=0;
	this.stk[this.ptr++]=1;
	var t=this.dstk.get("barlen");
	if (t===undefined) throw new Error("dict: barlen: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr++]=1;
	this.stk[this.ptr-2]=this.stk[this.ptr-2]-this.stk[this.ptr-1]; this.ptr--;
	this.stk[this.ptr++]=$f12;
	var t26=this.stk[--this.ptr];
	var t24=this.stk[--this.ptr];
	var t23=this.stk[--this.ptr];
	var t22=this.stk[--this.ptr];
	for (var t25=t22; t23<0 ? t25>=t24 : t25<=t24; t25+=t23) {
		this.stk[this.ptr++]=t25;
		if (t26.call(this)==-1) break;
	}
	this.stk[this.ptr++]="checksum"; //ident
	this.stk[this.ptr++]=10;
	var t=this.dstk.get("checksum");
	if (t===undefined) throw new Error("dict: checksum: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr++]=10;
	this.stk[this.ptr-2]=this.stk[this.ptr-2]%this.stk[this.ptr-1]; this.ptr--;
	this.stk[this.ptr-2]=this.stk[this.ptr-2]-this.stk[this.ptr-1]; this.ptr--;
	this.stk[this.ptr++]=10;
	this.stk[this.ptr-2]=this.stk[this.ptr-2]%this.stk[this.ptr-1]; this.ptr--;
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	this.stk[this.ptr++]="enc"; //ident
	var t=this.dstk.get("encs");
	if (t===undefined) throw new Error("dict: encs: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	var t=this.dstk.get("checksum");
	if (t===undefined) throw new Error("dict: checksum: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	if (this.stk[this.ptr-2] instanceof BWIPJS.psstring || this.stk[this.ptr-2] instanceof BWIPJS.psarray)
		this.stk[this.ptr-2]=this.stk[this.ptr-2].get(this.stk[this.ptr-1]);
	else this.stk[this.ptr-2]=this.stk[this.ptr-2][this.stk[this.ptr-1].toString()];
	this.ptr--;
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	this.stk[this.ptr++]="heights"; //ident
	var t=this.dstk.get("enc");
	if (t===undefined) throw new Error("dict: enc: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	if (typeof(this.stk[this.ptr-1].length)!=="number") throw "length: invalid: " + BWIPJS.pstype(this.stk[this.ptr-1]);
	this.stk[this.ptr-1]=this.stk[this.ptr-1].length;
	this.stk[this.ptr-1]=BWIPJS.psarray(this.stk[this.ptr-1]);
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	this.stk[this.ptr++]=0;
	this.stk[this.ptr++]=1;
	var t=this.dstk.get("enc");
	if (t===undefined) throw new Error("dict: enc: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	if (typeof(this.stk[this.ptr-1].length)!=="number") throw "length: invalid: " + BWIPJS.pstype(this.stk[this.ptr-1]);
	this.stk[this.ptr-1]=this.stk[this.ptr-1].length;
	this.stk[this.ptr++]=1;
	this.stk[this.ptr-2]=this.stk[this.ptr-2]-this.stk[this.ptr-1]; this.ptr--;
	this.stk[this.ptr++]=$f13;
	var t31=this.stk[--this.ptr];
	var t29=this.stk[--this.ptr];
	var t28=this.stk[--this.ptr];
	var t27=this.stk[--this.ptr];
	for (var t30=t27; t28<0 ? t30>=t29 : t30<=t29; t30+=t28) {
		this.stk[this.ptr++]=t30;
		if (t31.call(this)==-1) break;
	}
	var t=this.dstk.get("bhs");
	if (t===undefined) throw new Error("dict: bhs: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	var t=this.dstk.get("barlen");
	if (t===undefined) throw new Error("dict: barlen: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr++]=5;
	this.stk[this.ptr-2]=this.stk[this.ptr-2]*this.stk[this.ptr-1]; this.ptr--;
	this.stk[this.ptr++]=1;
	this.stk[this.ptr-2]=this.stk[this.ptr-2]+this.stk[this.ptr-1]; this.ptr--;
	var t=this.dstk.get("heights");
	if (t===undefined) throw new Error("dict: heights: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr-3].assign(this.stk[this.ptr-2],this.stk[this.ptr-1]); this.ptr-=3;
	var t=this.dstk.get("includecheckintext");
	if (t===undefined) throw new Error("dict: includecheckintext: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr++]=$f14;
	this.stk[this.ptr++]=$f15;
	var t32=this.stk[--this.ptr];
	var t33=this.stk[--this.ptr];
	if (this.stk[--this.ptr]) {
		if (t33.call(this)==-1) return -1;
	} else {
		if (t32.call(this)==-1) return -1;
	}
	this.stk[this.ptr++]="enc"; //ident
	var t=this.dstk.get("encs");
	if (t===undefined) throw new Error("dict: encs: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr++]=11;
	if (this.stk[this.ptr-2] instanceof BWIPJS.psstring || this.stk[this.ptr-2] instanceof BWIPJS.psarray)
		this.stk[this.ptr-2]=this.stk[this.ptr-2].get(this.stk[this.ptr-1]);
	else this.stk[this.ptr-2]=this.stk[this.ptr-2][this.stk[this.ptr-1].toString()];
	this.ptr--;
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	this.stk[this.ptr++]="heights"; //ident
	var t=this.dstk.get("enc");
	if (t===undefined) throw new Error("dict: enc: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	if (typeof(this.stk[this.ptr-1].length)!=="number") throw "length: invalid: " + BWIPJS.pstype(this.stk[this.ptr-1]);
	this.stk[this.ptr-1]=this.stk[this.ptr-1].length;
	this.stk[this.ptr-1]=BWIPJS.psarray(this.stk[this.ptr-1]);
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	this.stk[this.ptr++]=0;
	this.stk[this.ptr++]=1;
	var t=this.dstk.get("enc");
	if (t===undefined) throw new Error("dict: enc: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	if (typeof(this.stk[this.ptr-1].length)!=="number") throw "length: invalid: " + BWIPJS.pstype(this.stk[this.ptr-1]);
	this.stk[this.ptr-1]=this.stk[this.ptr-1].length;
	this.stk[this.ptr++]=1;
	this.stk[this.ptr-2]=this.stk[this.ptr-2]-this.stk[this.ptr-1]; this.ptr--;
	this.stk[this.ptr++]=$f16;
	var t38=this.stk[--this.ptr];
	var t36=this.stk[--this.ptr];
	var t35=this.stk[--this.ptr];
	var t34=this.stk[--this.ptr];
	for (var t37=t34; t35<0 ? t37>=t36 : t37<=t36; t37+=t35) {
		this.stk[this.ptr++]=t37;
		if (t38.call(this)==-1) break;
	}
	var t=this.dstk.get("bhs");
	if (t===undefined) throw new Error("dict: bhs: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	var t=this.dstk.get("barlen");
	if (t===undefined) throw new Error("dict: barlen: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr++]=5;
	this.stk[this.ptr-2]=this.stk[this.ptr-2]*this.stk[this.ptr-1]; this.ptr--;
	this.stk[this.ptr++]=6;
	this.stk[this.ptr-2]=this.stk[this.ptr-2]+this.stk[this.ptr-1]; this.ptr--;
	var t=this.dstk.get("heights");
	if (t===undefined) throw new Error("dict: heights: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr-3].assign(this.stk[this.ptr-2],this.stk[this.ptr-1]); this.ptr-=3;
	this.stk[this.ptr++]=Infinity;
	this.stk[this.ptr++]="ren"; //ident
	var t=this.dstk.get("renlinear");
	if (t===undefined) throw new Error("//renlinear: undefined");
	this.stk[this.ptr++]=t;
	this.stk[this.ptr++]="bhs"; //ident
	var t=this.dstk.get("bhs");
	if (t===undefined) throw new Error("dict: bhs: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr++]="bbs"; //ident
	this.stk[this.ptr++]=Infinity;
	var t=this.dstk.get("bhs");
	if (t===undefined) throw new Error("dict: bhs: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	if (typeof(this.stk[this.ptr-1].length)!=="number") throw "length: invalid: " + BWIPJS.pstype(this.stk[this.ptr-1]);
	this.stk[this.ptr-1]=this.stk[this.ptr-1].length;
	this.stk[this.ptr++]=$f17;
	var t41=this.stk[--this.ptr];
	var t39=this.stk[--this.ptr];
	for (var t40=0; t40<t39; t40++) {
		if (t41.call(this)==-1) break;
	}
	for (var i = this.ptr-1; i >= 0 && this.stk[i] !== Infinity; i--) ;
	if (i < 0) throw "array: underflow";
	var t = this.stk.splice(i+1, this.ptr-1-i);
	this.ptr = i;
	this.stk[this.ptr++]=BWIPJS.psarray(t);
	this.stk[this.ptr++]="sbs"; //ident
	this.stk[this.ptr++]=Infinity;
	var t=this.dstk.get("bhs");
	if (t===undefined) throw new Error("dict: bhs: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	if (typeof(this.stk[this.ptr-1].length)!=="number") throw "length: invalid: " + BWIPJS.pstype(this.stk[this.ptr-1]);
	this.stk[this.ptr-1]=this.stk[this.ptr-1].length;
	this.stk[this.ptr++]=1;
	this.stk[this.ptr-2]=this.stk[this.ptr-2]-this.stk[this.ptr-1]; this.ptr--;
	this.stk[this.ptr++]=$f18;
	var t44=this.stk[--this.ptr];
	var t42=this.stk[--this.ptr];
	for (var t43=0; t43<t42; t43++) {
		if (t44.call(this)==-1) break;
	}
	this.stk[this.ptr++]=1.44;
	for (var i = this.ptr-1; i >= 0 && this.stk[i] !== Infinity; i--) ;
	if (i < 0) throw "array: underflow";
	var t = this.stk.splice(i+1, this.ptr-1-i);
	this.ptr = i;
	this.stk[this.ptr++]=BWIPJS.psarray(t);
	var t=this.dstk.get("includetext");
	if (t===undefined) throw new Error("dict: includetext: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr++]=$f19;
	var t45=this.stk[--this.ptr];
	if (this.stk[--this.ptr]) {
		if (t45.call(this)==-1) return -1;
	}
	this.stk[this.ptr++]="opt"; //ident
	var t=this.dstk.get("options");
	if (t===undefined) throw new Error("dict: options: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	var t = {};
	for (var i = this.ptr-1; i >= 1 && this.stk[i] !== Infinity; i-=2) {
		if (this.stk[i-1] === Infinity) throw "dict: malformed stack";
		t[this.stk[i-1]]=this.stk[i];
	}
	if (i < 0 || this.stk[i]!==Infinity) throw "dict: underflow";
	this.ptr = i;
	this.stk[this.ptr++]=t;
	var t=this.dstk.get("dontdraw");
	if (t===undefined) throw new Error("dict: dontdraw: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	if (typeof(this.stk[this.ptr-1])=="boolean") this.stk[this.ptr-1]=!this.stk[this.ptr-1];
	else this.stk[this.ptr-1]=~this.stk[this.ptr-1];
	var t=this.dstk.get("renlinear");
	if (t===undefined) throw new Error("//renlinear: undefined");
	this.stk[this.ptr++]=t;
	var t46=this.stk[--this.ptr];
	if (this.stk[--this.ptr]) {
		if (t46.call(this)==-1) return -1;
	}
	this.dstk.pop(); this.dict=this.dstk[this.dstk.length-1];
	psstptr = this.ptr;
}
// END OF planet
