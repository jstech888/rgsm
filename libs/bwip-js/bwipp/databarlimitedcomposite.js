// file: bwipp/databarlimitedcomposite.js
//
// This code was automatically generated from:
// Barcode Writer in Pure PostScript - Version 2013-01-25
//
// Copyright (c) 2011-2013 Mark Warren
// Copyright (c) 2004-2013 Terry Burton
//
// See the LICENSE file in the bwip.js root directory
// for the extended copyright notice.
// BEGIN databarlimitedcomposite
if (!BWIPJS.bwipp["databarlimited"]) BWIPJS.load("bwipp/databarlimited.js");
if (!BWIPJS.bwipp["gs1-cc"]) BWIPJS.load("bwipp/gs1-cc.js");
if (!BWIPJS.bwipp["renlinear"]) BWIPJS.load("bwipp/renlinear.js");
if (!BWIPJS.bwipp["renmatrix"]) BWIPJS.load("bwipp/renmatrix.js");
BWIPJS.bwipp["databarlimitedcomposite"]=function() {
	this.dict["databarlimited"]=BWIPJS.bwipp["databarlimited"];
	this.dict["gs1-cc"]=BWIPJS.bwipp["gs1-cc"];
	this.dict["renlinear"]=BWIPJS.bwipp["renlinear"];
	this.dict["renmatrix"]=BWIPJS.bwipp["renmatrix"];
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
		this.stk[this.ptr++]="linear"; //ident
		var t=this.stk[this.ptr-2]; this.stk[this.ptr-2]=this.stk[this.ptr-1]; this.stk[this.ptr-1]=t;
		this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
		this.ptr--;
		this.stk[this.ptr++]="comp"; //ident
		var t=this.stk[this.ptr-2]; this.stk[this.ptr-2]=this.stk[this.ptr-1]; this.stk[this.ptr-1]=t;
		this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	}
	function $f7(){
		this.ptr--;
	}
	function $f8(){
		this.stk[this.ptr++]=1;
	}
	function $f9(){
		this.stk[this.ptr++]=$f8;
	}
	function $f10(){
		this.stk[this.ptr++]=0;
	}
	function $f11(){
		this.stk[this.ptr++]=$f10;
	}
	function $f12(){
		this.stk[this.ptr++]=1;
		if (this.stk[this.ptr-1] >= this.ptr) throw "index: underflow";
		this.stk[this.ptr-1]=this.stk[this.ptr-2-this.stk[this.ptr-1]];
		this.stk[this.ptr++]=0;
		if (this.stk[this.ptr-2] instanceof BWIPJS.psstring)
			this.stk[this.ptr-2]=this.stk[this.ptr-2].toString()==this.stk[this.ptr-1];
		else this.stk[this.ptr-2]=this.stk[this.ptr-2]==this.stk[this.ptr-1];
		this.ptr--;
		this.stk[this.ptr++]=$f9;
		this.stk[this.ptr++]=$f11;
		var t10=this.stk[--this.ptr];
		var t11=this.stk[--this.ptr];
		if (this.stk[--this.ptr]) {
			if (t11.call(this)==-1) return -1;
		} else {
			if (t10.call(this)==-1) return -1;
		}
		var t14=this.stk[--this.ptr];
		var t12=this.stk[--this.ptr];
		for (var t13=0; t13<t12; t13++) {
			if (t14.call(this)==-1) break;
		}
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
	var t=this.dstk.get("barcode");
	if (t===undefined) throw new Error("dict: barcode: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr++]=BWIPJS.psstring("|");
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
	this.stk[this.ptr++]=$f6;
	this.stk[this.ptr++]=$f7;
	var t8=this.stk[--this.ptr];
	var t9=this.stk[--this.ptr];
	if (this.stk[--this.ptr]) {
		if (t9.call(this)==-1) return -1;
	} else {
		if (t8.call(this)==-1) return -1;
	}
	this.gsave();
	var t=this.dstk.get("options");
	if (t===undefined) throw new Error("dict: options: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr++]=BWIPJS.psstring("lintype");
	this.stk[this.ptr++]=BWIPJS.psstring("databarlimited");
	if (this.stk[this.ptr-3] instanceof BWIPJS.psstring || this.stk[this.ptr-3] instanceof BWIPJS.psarray)
		this.stk[this.ptr-3].set(this.stk[this.ptr-2], this.stk[this.ptr-1]);
	else this.stk[this.ptr-3][this.stk[this.ptr-2].toString()]=this.stk[this.ptr-1];
	this.ptr-=3;
	var t=this.dstk.get("options");
	if (t===undefined) throw new Error("dict: options: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr++]=BWIPJS.psstring("linkage");
	this.stk[this.ptr++]=true;
	if (this.stk[this.ptr-3] instanceof BWIPJS.psstring || this.stk[this.ptr-3] instanceof BWIPJS.psarray)
		this.stk[this.ptr-3].set(this.stk[this.ptr-2], this.stk[this.ptr-1]);
	else this.stk[this.ptr-3][this.stk[this.ptr-2].toString()]=this.stk[this.ptr-1];
	this.ptr-=3;
	var t=this.dstk.get("options");
	if (t===undefined) throw new Error("dict: options: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr++]=BWIPJS.psstring("inkspread");
	this.stk[this.ptr++]=BWIPJS.psstring("0");
	if (this.stk[this.ptr-3] instanceof BWIPJS.psstring || this.stk[this.ptr-3] instanceof BWIPJS.psarray)
		this.stk[this.ptr-3].set(this.stk[this.ptr-2], this.stk[this.ptr-1]);
	else this.stk[this.ptr-3][this.stk[this.ptr-2].toString()]=this.stk[this.ptr-1];
	this.ptr-=3;
	var t=this.dstk.get("options");
	if (t===undefined) throw new Error("dict: options: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr++]=BWIPJS.psstring("dontdraw");
	this.stk[this.ptr++]=true;
	if (this.stk[this.ptr-3] instanceof BWIPJS.psstring || this.stk[this.ptr-3] instanceof BWIPJS.psarray)
		this.stk[this.ptr-3].set(this.stk[this.ptr-2], this.stk[this.ptr-1]);
	else this.stk[this.ptr-3][this.stk[this.ptr-2].toString()]=this.stk[this.ptr-1];
	this.ptr-=3;
	var t=this.dstk.get("linear");
	if (t===undefined) throw new Error("dict: linear: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	var t=this.dstk.get("options");
	if (t===undefined) throw new Error("dict: options: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	var t=this.dstk.get("databarlimited");
	if (t===undefined) throw new Error("//databarlimited: undefined");
	this.stk[this.ptr++]=t;
	var t=this.stk[--this.ptr];
	if (t instanceof Function) t.call(this); else this.eval(t);
	this.stk[this.ptr]=this.stk[this.ptr-1]; this.ptr++;
	this.stk[this.ptr++]=BWIPJS.psstring("sbs");
	if (this.stk[this.ptr-2] instanceof BWIPJS.psstring || this.stk[this.ptr-2] instanceof BWIPJS.psarray)
		this.stk[this.ptr-2]=this.stk[this.ptr-2].get(this.stk[this.ptr-1]);
	else this.stk[this.ptr-2]=this.stk[this.ptr-2][this.stk[this.ptr-1].toString()];
	this.ptr--;
	this.stk[this.ptr++]="linsbs"; //ident
	var t=this.stk[this.ptr-2]; this.stk[this.ptr-2]=this.stk[this.ptr-1]; this.stk[this.ptr-1]=t;
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	this.stk[this.ptr]=this.stk[this.ptr-1]; this.ptr++;
	this.stk[this.ptr++]=BWIPJS.psstring("bhs");
	if (this.stk[this.ptr-2] instanceof BWIPJS.psstring || this.stk[this.ptr-2] instanceof BWIPJS.psarray)
		this.stk[this.ptr-2]=this.stk[this.ptr-2].get(this.stk[this.ptr-1]);
	else this.stk[this.ptr-2]=this.stk[this.ptr-2][this.stk[this.ptr-1].toString()];
	this.ptr--;
	this.stk[this.ptr++]=0;
	if (this.stk[this.ptr-2] instanceof BWIPJS.psstring || this.stk[this.ptr-2] instanceof BWIPJS.psarray)
		this.stk[this.ptr-2]=this.stk[this.ptr-2].get(this.stk[this.ptr-1]);
	else this.stk[this.ptr-2]=this.stk[this.ptr-2][this.stk[this.ptr-1].toString()];
	this.ptr--;
	this.stk[this.ptr++]=72;
	this.stk[this.ptr-2]=this.stk[this.ptr-2]*this.stk[this.ptr-1]; this.ptr--;
	this.stk[this.ptr++]="linheight"; //ident
	var t=this.stk[this.ptr-2]; this.stk[this.ptr-2]=this.stk[this.ptr-1]; this.stk[this.ptr-1]=t;
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	var t=this.dstk.get("renlinear");
	if (t===undefined) throw new Error("//renlinear: undefined");
	this.stk[this.ptr++]=t;
	var t=this.stk[--this.ptr];
	if (t instanceof Function) t.call(this); else this.eval(t);
	this.stk[this.ptr++]=Infinity;
	this.stk[this.ptr++]=1;
	var t=this.dstk.get("linsbs");
	if (t===undefined) throw new Error("dict: linsbs: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr++]=$f12;
	var t17=this.stk[--this.ptr];
	var t16=this.stk[--this.ptr];
	for (t15 in t16) {
		if (t16 instanceof BWIPJS.psstring || t16 instanceof BWIPJS.psarray) {
			if (t15.charCodeAt(0) > 57) continue;
			this.stk[this.ptr++]=t16.get(t15);
		} else {
			this.stk[this.ptr++]=t15;
			this.stk[this.ptr++]=t16[t15];
		}
		if (t17.call(this)==-1) break;
	}
	for (var i=this.ptr-1; i>=0 && this.stk[i]!==Infinity; i--);
	if (i==-1) throw "counttomark: underflow";
	this.stk[this.ptr]=this.ptr-i-1;
	this.ptr++;
	this.stk[this.ptr++]=1;
	this.stk[this.ptr-2]=this.stk[this.ptr-2]-this.stk[this.ptr-1]; this.ptr--;
	this.stk[this.ptr-1]=BWIPJS.psarray(this.stk[this.ptr-1]);
	var t=this.stk[this.ptr-1];
	if (t.length >= this.ptr) throw "astore: underflow";
	var a=this.stk.splice(this.ptr-1-t.length,t.length);
	t.assign(0,a);
	this.ptr-=t.length;
	this.stk[this.ptr++]="sep"; //ident
	var t=this.stk[this.ptr-2]; this.stk[this.ptr-2]=this.stk[this.ptr-1]; this.stk[this.ptr-1]=t;
	this.dict[this.stk[this.ptr-2]]=this.stk[this.ptr-1]; this.ptr-=2;
	this.ptr--;
	this.ptr--;
	var t=this.dstk.get("sep");
	if (t===undefined) throw new Error("dict: sep: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr++]=0;
	this.stk[this.ptr++]=BWIPJS.psarray([0,0,0]);
	this.stk[this.ptr-3].assign(this.stk[this.ptr-2],this.stk[this.ptr-1]); this.ptr-=3;
	var t=this.dstk.get("sep");
	if (t===undefined) throw new Error("dict: sep: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	var t=this.dstk.get("sep");
	if (t===undefined) throw new Error("dict: sep: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	if (typeof(this.stk[this.ptr-1].length)!=="number") throw "length: invalid: " + BWIPJS.pstype(this.stk[this.ptr-1]);
	this.stk[this.ptr-1]=this.stk[this.ptr-1].length;
	this.stk[this.ptr++]=4;
	this.stk[this.ptr-2]=this.stk[this.ptr-2]-this.stk[this.ptr-1]; this.ptr--;
	this.stk[this.ptr++]=BWIPJS.psarray([0,0,0,0]);
	this.stk[this.ptr-3].assign(this.stk[this.ptr-2],this.stk[this.ptr-1]); this.ptr-=3;
	this.stk[this.ptr++]=0;
	var t=this.dstk.get("linheight");
	if (t===undefined) throw new Error("dict: linheight: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	var y=this.stk[--this.ptr];
	this.rmoveto(this.stk[--this.ptr],y);
	this.stk[this.ptr++]=Infinity;
	this.stk[this.ptr++]="ren"; //ident
	var t=this.dstk.get("renmatrix");
	if (t===undefined) throw new Error("//renmatrix: undefined");
	this.stk[this.ptr++]=t;
	this.stk[this.ptr++]="pixs"; //ident
	var t=this.dstk.get("sep");
	if (t===undefined) throw new Error("dict: sep: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	this.stk[this.ptr++]="pixx"; //ident
	var t=this.dstk.get("sep");
	if (t===undefined) throw new Error("dict: sep: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	if (typeof(this.stk[this.ptr-1].length)!=="number") throw "length: invalid: " + BWIPJS.pstype(this.stk[this.ptr-1]);
	this.stk[this.ptr-1]=this.stk[this.ptr-1].length;
	this.stk[this.ptr++]="pixy"; //ident
	this.stk[this.ptr++]=1;
	this.stk[this.ptr++]="height"; //ident
	this.stk[this.ptr++]=1;
	this.stk[this.ptr++]=72;
	this.stk[this.ptr-2]=this.stk[this.ptr-2]/this.stk[this.ptr-1]; this.ptr--;
	this.stk[this.ptr++]="width"; //ident
	var t=this.dstk.get("sep");
	if (t===undefined) throw new Error("dict: sep: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	if (typeof(this.stk[this.ptr-1].length)!=="number") throw "length: invalid: " + BWIPJS.pstype(this.stk[this.ptr-1]);
	this.stk[this.ptr-1]=this.stk[this.ptr-1].length;
	this.stk[this.ptr++]=72;
	this.stk[this.ptr-2]=this.stk[this.ptr-2]/this.stk[this.ptr-1]; this.ptr--;
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
	var t=this.dstk.get("renmatrix");
	if (t===undefined) throw new Error("//renmatrix: undefined");
	this.stk[this.ptr++]=t;
	var t=this.stk[--this.ptr];
	if (t instanceof Function) t.call(this); else this.eval(t);
	var t=this.dstk.get("comp");
	if (t===undefined) throw new Error("dict: comp: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	var t=this.dstk.get("options");
	if (t===undefined) throw new Error("dict: options: undefined");
	if (t instanceof Function) t.call(this); else this.stk[this.ptr++]=t;
	var t=this.dstk.get("gs1-cc");
	if (t===undefined) throw new Error("//gs1-cc: undefined");
	this.stk[this.ptr++]=t;
	var t=this.stk[--this.ptr];
	if (t instanceof Function) t.call(this); else this.eval(t);
	this.stk[this.ptr]=this.stk[this.ptr-1]; this.ptr++;
	this.stk[this.ptr++]=BWIPJS.psstring("pixx");
	if (this.stk[this.ptr-2] instanceof BWIPJS.psstring || this.stk[this.ptr-2] instanceof BWIPJS.psarray)
		this.stk[this.ptr-2]=this.stk[this.ptr-2].get(this.stk[this.ptr-1]);
	else this.stk[this.ptr-2]=this.stk[this.ptr-2][this.stk[this.ptr-1].toString()];
	this.ptr--;
	this.stk[this.ptr++]=72;
	var t=this.stk[this.ptr-2]; this.stk[this.ptr-2]=this.stk[this.ptr-1]; this.stk[this.ptr-1]=t;
	this.stk[this.ptr-2]=this.stk[this.ptr-2]-this.stk[this.ptr-1]; this.ptr--;
	this.stk[this.ptr++]=1;
	var y=this.stk[--this.ptr];
	this.rmoveto(this.stk[--this.ptr],y);
	var t=this.dstk.get("renmatrix");
	if (t===undefined) throw new Error("//renmatrix: undefined");
	this.stk[this.ptr++]=t;
	var t=this.stk[--this.ptr];
	if (t instanceof Function) t.call(this); else this.eval(t);
	this.grestore();
	this.dstk.pop(); this.dict=this.dstk[this.dstk.length-1];
	psstptr = this.ptr;
}
// END OF databarlimitedcomposite
