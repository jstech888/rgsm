<body class="CKFinderFrameWindow">
<style>
		#logout {
		  text-decoration: none;
		  color: #000000;
		  background: #F4F4F4;
		  display: block;
		  position: absolute;
		  padding: 5px;
		  right: 0;
		  border-radius: 5px;
		  margin-top: 4px;
		  margin-right: 10px;
		  font-weight: bold;
		  font-family: 微軟正黑體;
		  font-size: 15px;
		  padding-left: 33px;
		}
		#logout:hover {
		  background: #4D859E;
		}
		.logout-icon {
		  background: url(https://cdn1.iconfinder.com/data/icons/web-ui/30/power-01-512.png);
		  background-size: 24px 24px;
		  width: 24px;
		  height: 24px;
		  position: absolute;
		  left: 7px;
		  top: 3px;
		}
</style>
	<a id="logout" href="/admin/dashboard"><div class="logout-icon"></div>離開</a>
	<div id="ckfinder"></div>
	<script type="text/javascript" src="/file/ckfinder.js"></script>
	<script type="text/javascript">
//<![CDATA[
(function()
{
		var config = {};
		var get = CKFinder.tools.getUrlParam;
		var getBool = function( v )
		{
			var t = get( v );

			if ( t === null )
				return null;

			return t == '0' ? false : true;
		};

		var tmp;
		if ( tmp = get( 'configId' ) )
		{
			var win = window.opener || window;
			try
			{
				while ( ( !win.CKFinder || !win.CKFinder._.instanceConfig[ tmp ] ) && win != window.top )
					win = win.parent;

				if ( win.CKFinder._.instanceConfig[ tmp ] )
					config = CKFINDER.tools.extend( {}, win.CKFinder._.instanceConfig[ tmp ] );
			}
			catch(e) {}
		}
		
		if ( tmp = get( 'basePath' ) )
			CKFINDER.basePath = tmp;

		if ( tmp = get( 'startupPath' ) || get( 'start' ) )
			config.startupPath = decodeURIComponent( tmp );

		config.id = get( 'id' ) || '';

		if ( ( tmp = getBool( 'rlf' ) ) !== null )
			config.rememberLastFolder = tmp;

		if ( ( tmp = getBool( 'dts' ) ) !== null )
			config.disableThumbnailSelection = tmp;

		if ( tmp = get( 'data' ) )
			config.selectActionData = tmp;

		if ( tmp = get( 'tdata' ) )
			config.selectThumbnailActionData = tmp;

		if ( tmp = get( 'type' ) )
			config.resourceType = tmp;

		if ( tmp = get( 'skin' ) )
			config.skin = tmp;

		if ( tmp = get( 'langCode' ) )
			config.language = tmp;

		if ( typeof( config.selectActionFunction ) == 'undefined' )
		{
			// Try to get desired "File Select" action from the URL.
			var action;
			if ( tmp = get( 'CKEditor' ) )
			{
				if ( tmp.length )
					action = 'ckeditor';
			}
			if ( !action )
				action = get( 'action' );

			var parentWindow = ( window.parent == window ) ? window.opener : window.parent;
			switch ( action )
			{
				case 'js':
					var actionFunction = get( 'func' );
					if ( actionFunction && actionFunction.length > 0 )
						config.selectActionFunction = parentWindow[ actionFunction ];

					actionFunction = get( 'thumbFunc' );
					if ( actionFunction && actionFunction.length > 0 )
						config.selectThumbnailActionFunction = parentWindow[ actionFunction ];
					break ;

				case 'ckeditor':
					var funcNum = get( 'CKEditorFuncNum' );
					if ( parentWindow['CKEDITOR'] )
					{
						config.selectActionFunction = function( fileUrl, data )
						{
							parentWindow['CKEDITOR'].tools.callFunction( funcNum, fileUrl, data );
						};

						config.selectThumbnailActionFunction = config.selectActionFunction;
					}
					break;

				default:
					if ( parentWindow && parentWindow['FCK'] && parentWindow['SetUrl'] )
					{
						action = 'fckeditor' ;
						config.selectActionFunction = parentWindow['SetUrl'];

						if ( !config.disableThumbnailSelection )
							config.selectThumbnailActionFunction = parentWindow['SetUrl'];
					}
					else
						action = null ;
			}
			config.action = action;
		}

		// Always use 100% width and height when nested using this middle page.
		config.width = '100%';
		config.height = document.documentElement.clientHeight;

		var ckfinder = new CKFinder( config );
		ckfinder.replace( 'ckfinder', config );
})();
//]]>
	</script>
	
</body>
</html>