Environment: 

 Develop two python programs in opensource GoogleCoLab
 Source: https://colab.research.google.com/
 
Notes for two datasets:

Local weather station dataset:
The date format for this dataset is d/mm/yyyy h:mm. I format this column as d/mm/yyyy hh:mm

BOM Daily solar radiation dataset:
I have removed the lines after the value bottom of each grid file. The consolidated June and July data is Bom.zip. I have attached this as an email attachment. Please unzip it.

Environment setup:

I am using open source Google Colab (colab.research.google.com) to write Python code. 

To read the grid files in Python please install these it may be needed: 
pip install gridDataFormats
pip install --upgrade gridDataFormats

Program name:
processing_data_with_extra_bom.py
anomaly_detection.py
Local weather station dataset: weather_data_new.csv
Processed data: Result_processing_BOM_and_WS
Consolidate June and July BOM data: attached email in zip format

Tasks:

There are total five tasks in this challenge. I group these tasks three:

Task One: 
Processing the data
Visualization of data or results
Additional Task – Extra BOM data

Task Two:
Additional Task – Uploading results to a data store

Task Three:
Additional Task – Anomaly detection
