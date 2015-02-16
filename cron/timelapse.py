#!/usr/bin/python

import os
import random
import sys
import time
import ephem
import datetime

date = time.strftime("%Y-%m-%d")

H264_FILENAME = ("/media/usb/timelapse/%s.h264" % date);
MP4_FILENAME = ("/media/usb/timelapse/%s.mp4" % date)


if __name__ == '__main__':

	now = datetime.datetime.now()

	here = ephem.Observer()

	here.lon, here.lat = '-4.4540148', '50.3565558'

	sunrise = here.next_rising(ephem.Sun())

	sunset = here.next_setting(ephem.Sun())

	time_before = datetime.timedelta(minutes=40)

	time_after = datetime.timedelta(minutes=20)

	sunrise = ephem.localtime(sunrise) - time_before

	sunset = ephem.localtime(sunset) + time_after

	video_length = (sunset - sunrise).total_seconds() * 1000

	total_frames = 60 * 25

	frame_time = video_length / total_frames

	RECORD_COMMAND = "raspiyuv -h 1072 -w 1920 -t %(length)d -tl %(slice)d -o - | rpi-encode-yuv > %(file)s"

	print(RECORD_COMMAND % {"length": video_length, "slice": frame_time, "file": H264_FILENAME})

	sleep_time = (sunrise - now).total_seconds()

	print("Sleeping for %d seconds" % sleep_time)

	time.sleep(sleep_time)

	os.system(RECORD_COMMAND % {"length": video_length, "slice": frame_time, "file": H264_FILENAME})

	os.system("MP4Box -fps 25 -add %(in_file)s %(out_file)s" % {"in_file": H264_FILENAME, "out_file": MP4_FILENAME})

	if not os.path.exists(MP4_FILENAME):
		exit("No video to upload")

	os.remove(H264_FILENAME)
	#os.remove(MP4_FILENAME)
