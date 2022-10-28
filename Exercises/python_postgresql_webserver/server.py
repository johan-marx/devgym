from http.server import HTTPServer, BaseHTTPRequestHandler
import json

BIND_HOST = 'localhost'
PORT = 8008


class SimpleHTTPRequestHandler(BaseHTTPRequestHandler):
    def do_GET(self):
        if (self.path == "/users"):
            x = {
                "name": "John",
                "age": 30,
                "city": "New York"
            }
            self.output(bytes(json.dumps(x), 'utf-8'))

    def output(self, content):
        self.send_response(200)
        self.send_header("content-type", "application/json")
        self.end_headers()
        self.wfile.write(content)

        print(self.headers)
        print(content.decode('utf-8'))


print(f'Listening on http://{BIND_HOST}:{PORT}\n')

httpd = HTTPServer((BIND_HOST, PORT), SimpleHTTPRequestHandler)
httpd.serve_forever()
