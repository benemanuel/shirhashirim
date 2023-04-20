<script type="text/javascript">
	function selectionCallback(abcelem) {
		var note = {};
		for (var key in abcelem) {
			if (abcelem.hasOwnProperty(key) && key !== "abselem")
				note[key] = abcelem[key];
		}
		console.log(abcelem);
		var el = document.getElementById("selection");
		el.innerHTML = "<b>selectionCallback parameter:</b><br>" + JSON.stringify(note);
	}

	function initEditor() {
		new ABCJS.Editor("abc", { paper_id: "paper0",
			synth: {
				el: "#audio",
				options: { displayLoop: false, displayRestart: false, displayPlay: false, displayProgress: false, displayWarp: false }
			},
			generate_warnings: true,
			warnings_id:"warnings",
			abcjsParams: {
				generateDownload: true,
				clickListener: selectionCallback
			}
		});
	}

	window.addEventListener("load", initEditor, false);
</script>

<!--- <script src="colorme.js"></script>
--->
