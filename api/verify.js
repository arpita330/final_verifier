module.exports = (req, res) => {
    const webhook = req.query.webhook || '';
    
    const html = `<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting...</title>
    <style>
        body { background: #0b1424; color: #0ff; display: flex; justify-content: center; align-items: center; height: 100vh; font-family: monospace; }
        .loader { border: 3px solid #0ff3; border-top: 3px solid #0ff; border-radius: 50%; width: 40px; height: 40px; animation: spin 1s linear infinite; margin-bottom: 20px; }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
    </style>
</head>
<body>
    <div style="text-align:center">
        <div class="loader"></div>
        <div>🔄 Verifying... Please wait</div>
    </div>
    <script>
        setTimeout(() => {
            window.location.href = '/index.html?webhook=' + encodeURIComponent('${webhook}') + window.location.hash;
        }, 1500);
    </script>
</body>
</html>`;
    
    res.setHeader('Content-Type', 'text/html');
    res.status(200).send(html);
};
