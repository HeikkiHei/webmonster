#!/bin/bash

source config/environment.sh

ssh $USERNAME@2017.cs.helsinki.fi '
tail -f /home/userlogs/$USER.error'
