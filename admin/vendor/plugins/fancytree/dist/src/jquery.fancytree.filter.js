/*!
 * jquery.fancytree.filter.js
 *
 * Remove or highlight tree nodes, based on a filter.
 * (Extension module for jquery.fancytree.js: https://github.com/mar10/fancytree/)
 *
 * Copyright (c) 2008-2015, Martin Wendt (http://wwWendt.de)
 *
 * Released under the MIT license
 * https://github.com/mar10/fancytree/wiki/LicenseInfo
 *
 * @version 2.9.0
 * @date 2015-04-19T13:41
 */

;(function($, window, document, undefined) {

"use strict";


/*******************************************************************************
 * Private functions and variables
 */

function _escapeRegex(str){
	/*jshint regexdash:true */
	return (str + "").replace(/([.?*+\^\$\[\]\\(){}|-])/g, "\\$1");
}

$.ui.fancytree._FancytreeClass.prototype._applyFilterImpl = function(filter, branchMode, opts){
	var leavesOnly, match, re,
		count = 0,
		hideMode = this.options.filter.mode === "hide";

	opts = opts || {};
	leavesOnly = !!opts.leavesOnly && !branchMode;

	// Default to 'match title substring (not case sensitive)'
	if(typeof filter === "string"){
		match = _escapeRegex(filter); // make sure a '.' is treated literally
		re = new RegExp(".*" + match + ".*", "i");
		filter = function(node){
			return !!re.exec(node.title);
		};
	}

	this.enableFilter = true;
	this.lastFilterArgs = arguments;

	this.$div.addClass("fancytree-ext-filter");
	if( hideMode ){
		this.$div.addClass("fancytree-ext-filter-hide");
	} else {
		this.$div.addClass("fancytree-ext-filter-dimm");
	}
	// Reset current filter
	this.visit(function(node){
		delete node.match;
		delete node.subMatch;
	});
	// Adjust node.hide, .match, .subMatch flags
	this.visit(function(node){
		if ((!leavesOnly || node.children == null) && filter(node)) {
			count++;
			node.match = true;
			node.visitParents(function(p){
				p.subMatch = true;
				if( opts.autoExpand && !p.expanded ) {
					p.setExpanded(true, {noAnimation: true, noEvents: true, scrollIntoView: false});
					p._filterAutoExpanded = true;
				}
			});
			if( branchMode ) {
				node.visit(function(p){
					p.match = true;
				});
				return "skip";
			}
		}
	});
	// Redraw
	this.render();
	return count;
};

/**
 * [ext-filter] Dimm or hide nodes.
 *
 * @param {function | string} filter
 * @param {boolean} [opts={autoExpand: false, leavesOnly: false}]
 * @returns {integer} count
 * @alias Fancytree#filterNodes
 * @requires jquery.fancytree.filter.js
 */
$.ui.fancytree._FancytreeClass.prototype.filterNodes = function(filter, opts) {
	if( typeof opts === "boolean" ) {
		opts = { leavesOnly: opts };
		this.warn("Fancytree.filterNodes() leavesOnly option is deprecated since 2015-04-20.");
	}
	return this._applyFilterImpl(filter, false, opts);
};

/**
 * @deprecated
 */
$.ui.fancytree._FancytreeClass.prototype.applyFilter = function(filter){
	this.warn("Fancytree.applyFilter() is deprecated since 2014-05-10. Use .filterNodes() instead.");
	return this.filterNodes.apply(this, arguments);
};

/**
 * [ext-filter] Dimm or hide whole branches.
 *
 * @param {function | string} filter
 * @param {boolean} [opts={autoExpand: false}]
 * @returns {integer} count
 * @alias Fancytree#filterBranches
 * @requires jquery.fancytree.filter.js
 */
$.ui.fancytree._FancytreeClass.prototype.filterBranches = function(filter, opts){
	return this._applyFilterImpl(filter, true, null);
};


/**
 * [ext-filter] Reset the filter.
 *
 * @alias Fancytree#clearFilter
 * @requires jquery.fancytree.filter.js
 */
$.ui.fancytree._FancytreeClass.prototype.clearFilter = function(){
	this.visit(function(node){
		delete node.match;
		delete node.subMatch;
		if( node._filterAutoExpanded && node.expanded ) {
			node.setExpanded(false, {noAnimation: true, noEvents: true, scrollIntoView: false});
		}
		delete node._filterAutoExpanded;
	});
	this.enableFilter = false;
	this.lastFilterArgs = null;
	this.$div.removeClass("fancytree-ext-filter fancytree-ext-filter-dimm fancytree-ext-filter-hide");
	this.render();
};


/*******************************************************************************
 * Extension code
 */
$.ui.fancytree.registerExtension({
	name: "filter",
	version: "0.4.0",
	// Default options for this extension.
	options: {
		autoApply: true, // re-apply last filter if lazy data is loaded
		mode: "dimm"
	},
	// treeInit: function(ctx){
	// 	this._superApply(arguments);
	// },
	nodeLoadChildren: function(ctx, source) {
		return this._superApply(arguments).done(function() {
			if( ctx.tree.enableFilter && ctx.tree.lastFilterArgs && ctx.options.filter.autoApply ) {
				ctx.tree._applyFilterImpl.apply(ctx.tree, ctx.tree.lastFilterArgs);
			}
		});
	},
	nodeSetExpanded: function(ctx, flag, callOpts) {
		delete ctx.node._filterAutoExpanded;
		return this._superApply(arguments);
	},
	nodeRenderStatus: function(ctx) {
		// Set classes for current status
		var res,
			node = ctx.node,
			tree = ctx.tree,
			$span = $(node[tree.statusClassPropName]);

		res = this._superApply(arguments);
		// nothing to do, if node was not yet rendered
		if( !$span.length || !tree.enableFilter ) {
			return res;
		}
		$span
			.toggleClass("fancytree-match", !!node.match)
			.toggleClass("fancytree-submatch", !!node.subMatch)
			.toggleClass("fancytree-hide", !(node.match || node.subMatch));

		return res;
	}
});
}(jQuery, window, document));
