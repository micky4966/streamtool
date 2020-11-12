#!/bin/bash
   nvidia-smi -q -x > /tmp/.check_mk_nvidia_smi
   cards=$(xml_grep --text_only 'nvidia_smi_log/attached_gpus' /tmp/.check_mk_nvidia_smi | tr -d ' ')
   IFS=$'\n' names=($(xml_grep --text_only 'nvidia_smi_log/gpu/product_name' /tmp/.check_mk_nvidia_smi))
   IFS=$'\n' fan_speed=($(xml_grep --text_only 'nvidia_smi_log/gpu/fan_speed' /tmp/.check_mk_nvidia_smi | tr -d ' '))
   IFS=$'\n' gpu_utilization=($(xml_grep --text_only 'nvidia_smi_log/gpu/utilization/gpu_util' /tmp/.check_mk_nvidia_smi | tr -d ' '))
   IFS=$'\n' mem_utilization=($(xml_grep --text_only 'nvidia_smi_log/gpu/utilization/memory_util' /tmp/.check_mk_nvidia_smi | tr -d ' '))
   IFS=$'\n' encoder_util=($(xml_grep --text_only 'nvidia_smi_log/gpu/utilization/encoder_util' /tmp/.check_mk_nvidia_smi | tr -d ' '))
   IFS=$'\n' decoder_util=($(xml_grep --text_only 'nvidia_smi_log/gpu/utilization/decoder_util' /tmp/.check_mk_nvidia_smi | tr -d ' '))
   IFS=$'\n' temperature=($(xml_grep --text_only 'nvidia_smi_log/gpu/temperature/gpu_temp' /tmp/.check_mk_nvidia_smi | tr -d ' '))
   IFS=$'\n' power_draw=($(xml_grep --text_only 'nvidia_smi_log/gpu/power_readings/power_draw' /tmp/.check_mk_nvidia_smi | tr -d ' '))
   IFS=$'\n' power_limit=($(xml_grep --text_only 'nvidia_smi_log/gpu/power_readings/power_limit' /tmp/.check_mk_nvidia_smi | tr -d ' '))

echo "cardname,fanspeed,gpuutil,memutil,encodutil,decodutil,temp,power,powerlimit"

   for i in $(seq 1 $cards) ; do
       index=$(($i - 1))
       fan_speed[$index]=${fan_speed[$index]/\%/}
       gpu_utilization[$index]=${gpu_utilization[$index]/\%/}
       mem_utilization[$index]=${mem_utilization[$index]/\%/}
       decoder_util[$index]=${decoder_util[$index]/\%/}
       encoder_util[$index]=${encoder_util[$index]/\%/}
       temperature[$index]=${temperature[$index]/C/}
       power_draw[$index]=${power_draw[$index]/W/}
       power_limit[$index]=${power_limit[$index]/W/}

echo "${names[$index]},${fan_speed[$index]},${gpu_utilization[$index]},${mem_utilization[$index]},${encoder_util[$index]},${decoder_util[$index]},${temperature[$index]},${power_draw[$index]},${power_limit[$index]}"
done
