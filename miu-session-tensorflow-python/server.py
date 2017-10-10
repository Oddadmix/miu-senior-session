from flask import Flask, abort, request, Response 
import json
import numpy as np
import tensorflow as tf
from flask import jsonify

app = Flask(__name__)

modelFullPath = 'data/output_graph.pb'
labelsFullPath = 'data/output_labels.txt'




def create_graph():
    """Creates a graph from saved GraphDef file and returns a saver."""
    # Creates graph from saved graph_def.pb.
    with tf.gfile.FastGFile(modelFullPath, 'rb') as f:
        graph_def = tf.GraphDef()
        graph_def.ParseFromString(f.read())
        _ = tf.import_graph_def(graph_def, name='')


@app.route('/classify', methods=['POST']) 
def foo():

    image_file = request.files['file']
    image_data = image_file.read()

    # Creates graph from saved GraphDef.
    create_graph()

    with tf.Session() as sess:

        softmax_tensor = sess.graph.get_tensor_by_name('final_result:0')
        predictions = sess.run(softmax_tensor,
                               {'DecodeJpeg/contents:0': image_data})
        predictions = np.squeeze(predictions)

        top_k = predictions.argsort()[-5:][::-1]  # Getting top 5 predictions
        f = open(labelsFullPath, 'rb')
        lines = f.readlines()
        labels = [str(w).replace("\n", "") for w in lines]
	result = []
	
        for node_id in top_k:
            human_string = labels[node_id]
            score = predictions[node_id]
            item = {"label" : human_string , "value" : round(score,3)}
	    result.append(item)
	    print('%s (score = %.5f)' % (human_string, score))

        answer = labels[top_k[0]]
	
    	return Response(json.dumps(result), mimetype='application/json');


if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)
