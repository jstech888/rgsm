jQuery(document).ready(function(){
// jQUnit defines:
// asyncTest,deepEqual,equal,expect,module,notDeepEqual,notEqual,notStrictEqual,ok,QUnit,raises,start,stop,strictEqual,test

/*globals TEST_TOOLS,expect,module,ok,QUnit,test */

var $ = jQuery,
	// Use tools from test-tools.js
	tools = TEST_TOOLS;

/* *****************************************************************************
 * QUnit setup
 */
QUnit.log(function(data) {
	if(window.console && window.console.log) {
		window.console.log(data.result + " :: " + data.message);
	}
});

QUnit.done(function( details ) {
	// Expand last section when all tests are run
	$("ol#qunit-tests > li:last > ol").show("slow");
});

/* *****************************************************************************
 * Tool functions
 */


function _resetEmptyTree(options){
	QUnit.reset();
	// destroy all trees
	$(":ui-fancytree").fancytree("destroy");

	var opts,
		$tree = $("#tree");

	opts = $.extend({
		source: [{title: "root node", key: "root"}],
		toggleEffect: false
	}, options);
	$tree.fancytree(opts);
	return $tree.fancytree("getTree");
}


/* Execute callback immediately and log timing as test result.
 * This function should be called inside a test() function.
 */
function benchmark(testName, count, callback) {
	tools.makeBenchWrapper(testName, count, callback).call();
}

//$.ui.fancytree._FancytreeNodeClass.prototype.addChildren
//    = profileWrapper($.ui.fancytree._FancytreeNodeClass.prototype.addChildren);

function addNodes(node, level1, level2, level3, forceUpdate) {
//	if( forceUpdate !== true ){
//		node.tree.enableUpdate(false);
//	}
	var d, f, i, j, k, key;
	for(i=0; i<level1; i++) {
		key = "" + (i+1);
		f = node.addChildren({title: "Folder_" + key,
							   key: key,
							   folder: true
							   });
		for (j=0; j<level2; j++) {
			key = "" + (i+1) + "." + (j+1);
			d = f.addChildren({title: "Node_" + key,
							  key: key
							  });
			for (k=0; k<level3; k++) {
				key = "" + (i+1) + "." + (j+1) + "." + (k+1);
				d.addChildren({title: "Node_" + key,
						  key: key
						  });
			}
		}
	}
//	node.tree.enableUpdate(true);
}


//*****************************************************************************

module("API");

test("Trigger events", function() {
	expect(3);
	benchmark("10000 createNode DOM events (widget._trigger())", 10000, function() {
		var i,
			tree = _resetEmptyTree({
				createNode: function(event, data){}
				}),
			node = tree.getNodeByKey("root");
		for(i=0; i<10000; i++){
			tree._triggerNodeEvent.call(tree, "createNode", node);
		}
	});
	benchmark("10000 createNode callback events (options.createNode() defined)", 10000, function() {
		var i,
			tree = _resetEmptyTree({
				createNode: function(event, data){}
				});
		for(i=0; i<10000; i++){
			if(tree.options.createNode){
				tree.options.createNode.call(tree, {}, {});
			}
		}
	});
	benchmark("10000 createNode callback events (options.createNode() undefined)", 10000, function() {
		var i,
			tree = _resetEmptyTree({});
		for(i=0; i<10000; i++){
			if(tree.options.createNode){
				tree.options.createNode.call(tree, {}, {});
			}
		}
	});
});


//*****************************************************************************

module("Standard tree");

test("Add nodes using API to collapsed node (no rendering)", function() {
	expect(3);

	var tree = _resetEmptyTree();

	benchmark("1000 nodes flat", 1000, function() {
		var node = tree.getNodeByKey("root");
		addNodes(node, 1000, 0, 0);
	});

	tree = _resetEmptyTree();
	benchmark("1000 nodes deep (10x10x10)", 1000, function() {
		var node = tree.getNodeByKey("root");
		addNodes(node, 10, 10, 10);
	});

	tree = _resetEmptyTree({aria: true});
	benchmark("1000 nodes deep (10x10x10) with ARIA", 1000, function() {
		var node = tree.getNodeByKey("root");
		addNodes(node, 10, 10, 10);
	});
});


test("Create and render hidden nodes, but don't make visible (i.e. don't expand)", function() {
	expect(3);

	var tree = _resetEmptyTree();
	benchmark("1000 nodes flat and force render(deep=true)", 1000, function() {
		var node = tree.getNodeByKey("root");
		addNodes(node, 1000, 0, 0);
		tree.render(true, true);
	});

	tree = _resetEmptyTree();
	benchmark("1000 nodes deep (10x10x10) and force render(deep=true)", 1000, function() {
		var node = tree.getNodeByKey("root");
		addNodes(node, 10, 10, 10);
		tree.render(true, true);
	});

	tree = _resetEmptyTree({aria: true});
	benchmark("1000 nodes deep (10x10x10) and force render(deep=true) with ARIA", 1000, function() {
		var node = tree.getNodeByKey("root");
		addNodes(node, 10, 10, 10);
		tree.render(true, true);
	});
});


test("Expand 1000 nodes deep (with 10 top level nodes, triggers expand -> render and display)", function() {
	expect(5);

	var tree = _resetEmptyTree(),
		node = tree.getNodeByKey("root"),
		timer = new tools.AsyncTimer("1000 deep (10x10x10) with expand", 1000);

	addNodes(node, 10, 10, 10);
	timer.subtime("addNodes");

	node.setExpanded().done(function(){
		timer.subtime("expand done");
		// force browser to re-flow?
//		var dummy = tree.$div[0].offsetHeight;
		timer.subtime("calc offsetHeigth, (force reflow?)");
		setTimeout(function(){
			// yield, so browser can redraw
			timer.subtime("setTimeout(0) to allow reflow/redraw");
			timer.stop();
		}, 0);
	});
});


test("Expand 1000 top level nodes (triggers expand -> render and display)", function() {
	expect(2);

	var tree = _resetEmptyTree(),
		node = tree.getNodeByKey("root"),
		timer = new tools.AsyncTimer("1000 top level nodes flat with expand", 1000);

	addNodes(node, 1000, 0, 0);
	timer.subtime("addNodes");

	node.setExpanded().done(function(){
		timer.stop();
	});
});


test("Expand 1000 top level nodes with ARIA and checkboxes (triggers expand -> render and display)", function() {
	expect(2);

	var tree = _resetEmptyTree({
			aria: true,
			checkbox:true
		}),
		node = tree.getNodeByKey("root"),
		timer = new tools.AsyncTimer("1000 top level nodes flat with expand", 1000);

	addNodes(node, 1000, 0, 0);
	timer.subtime("addNodes");

	node.setExpanded().done(function(){
		timer.stop();
	});
});


/* *****************************************************************************
 *
 */
module("Table tree");

test("tabletree (6 columns): render and expand", function() {
	expect(2);

	_resetEmptyTree();

//	var $ico1 = $("<img>", {src: "/src/skin-win8/icons.gif"});
//	var $ico2 = $("<span>", {
//		"class": "fancytree-icon"
////		css: "/src/skin-win8/icons.gif"
//		});

	var node, timer, tree, $tree;

	$tree = $("#tabletree").fancytree({
		extensions: ["table"],
		source: [{title: "root node", key: "root"}],
		table: {
			indentation: 20,  // indent 20px per node level
			nodeColumnIdx: 0  // render the node title into the 2nd column
		},
		renderColumns: function(event, data) {
			var node = data.node,
				$tdList = $(node.tr).find(">td");
//			$tdList.eq(0).text(node.getIndexHier()).addClass("alignRight");
			// (index #0 is rendered by fancytree)
//			$tdList.eq(1).append($ico2);
//			$tdList.eq(2).append($("<img>", {src: "/src/skin-win8/icons.gif"}));
			$tdList.eq(1).append( $("<span>", {
				"class": "fancytree-icon"
//					css: "/src/skin-win8/icons.gif"
					}));
			$tdList.eq(2).append( $("<span>", {
				"class": "fancytree-icon"
//					css: "/src/skin-win8/icons.gif"
					}));
			$tdList.eq(3).append( $("<span>", {
				"class": "fancytree-icon"
//					css: "/src/skin-win8/icons.gif"
					}));
//            $tdList.eq(3).html("<input type='checkbox' name='like' value='" + node.key + "'>");
			$tdList.eq(4).text("2013-02-17");
			$tdList.eq(5).text("Homer Simpson");
		}
	});

	tree = $tree.fancytree("getTree");
	node = tree.getNodeByKey("root");
	timer = new tools.AsyncTimer("1000 nodes flat and expand", 1000);
//    var timer = new AsyncTimer("1000 nodes (10 x 10 x 10) and force render(deep=true)");

	addNodes(node, 1000, 0, 0);
//    addNodes(node, 10, 10, 10);
//  addNodes(node, 1, 390, 0);
	timer.subtime("addNodes");

//    tree.render(true, true);
//    timer.subtime("render");

	node.setExpanded().done(function(){
		timer.stop();
	});
});


/* *****************************************************************************
 *
 */

module("Configuration and Summary");
test("", function() {
	expect(5);
	QUnit.reset();

	ok(true, "Fancytree v" + $.ui.fancytree.version);
	ok(true, "jQuery UI " + jQuery.ui.version);
	ok(true, "jQuery " + jQuery.fn.jquery);
	ok(true, "Browser: " + tools.getBrowserInfo());
	ok(true, "Cumulated test time: " + tools.TOTAL_ELAP + " milliseconds");
});
// ---
});
