<title>abcjs: Basic Demo</title>
	<script src="abcjs-basic.js" type="text/javascript"></script>
	<script type="text/javascript">

function readTextFileFromURL(url) {
  return new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        resolve(xhr.responseText);
      }
    };
    xhr.onerror = reject;
    xhr.send();
  });
}

    const url = "https://shirhashirim.org.il/intro/kuku.txt";
    const abc = readTextFileFromURL(url);

	function load() {
			ABCJS.renderAbc("paper",  abc);
	}

	</script>
