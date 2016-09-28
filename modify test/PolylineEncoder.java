package edu.nyu.cs9053.homework2;

import java.util.ArrayList;



/**
 * User: blangel
 * Date: 8/17/14
 * Time: 9:02 AM
 *
 * Implements the Polyline Algorithm defined here
 * {@literal https://developers.google.com/maps/documentation/utilities/polylinealgorithm}
 */
public class PolylineEncoder {

    public String encodePolyline(Gps[] gpsPoints) {
		StringBuilder resultBulider = new StringBuilder();
		if (gpsPoints == null || gpsPoints.length == 0) {
			return resultBulider.toString();
		}
    	int prevLatitude = 0;
    	int prevLongitude = 0;
    	for (int i = 0; i < gpsPoints.length; i++) {
    		int latitude = (int) (gpsPoints[i].getLatitude() * 1e5);
    		int longitude = (int) (gpsPoints[i].getLongitude() * 1e5);
			resultBulider.append(encodeValue(latitude - prevLatitude)).append(encodeValue(longitude - prevLongitude));
			//result = result + encodeValue(latitude - prevLatitude) + encodeValue(longitude - prevLongitude);
			prevLatitude = latitude;
			prevLongitude = longitude;
    	}
    	return resultBulider.toString();
    }

// https://developers.google.com/maps/documentation/utilities/polylinealgorithm
    private String encodeValue(int value) {
		// Step 1-4
    	if (value < 0) {
    		value = ~(value << 1);
    	} else {
    		value = value << 1;
    	}
		//Step 5-10
    	ArrayList<Integer> chunks = new ArrayList<Integer>();
    	splitToChunks(value, chunks);
    	StringBuilder encodedValueBuilder = new StringBuilder();
		//Step 11
    	for (int chunk : chunks) {
    		char chunkToAscii = (char) (chunk + 63);
    		encodedValueBuilder.append(chunkToAscii);

    	}
    	return encodedValueBuilder.toString();
    }

    private void splitToChunks(int value, ArrayList<Integer> chunks) {
    	while (value >= 32) {
    		int chunk = (value & 31) | 0x20;
    		chunks.add(chunk);
    		value = value >>> 5;
    	}
    	chunks.add(value);
    }

}
